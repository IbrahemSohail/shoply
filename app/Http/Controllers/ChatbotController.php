<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function handle(Request $request)
    {
        // Use mb_strtolower for proper Arabic support
        $message = mb_strtolower($request->input('message'), 'UTF-8');
        $isArabic = preg_match('/\p{Arabic}/u', $message);
        $response = null;

        // 1. Define Knowledge Base (Questions & Answers)
        // Ensure keywords cover common variations
        $knowledgeBase = [
            'greeting' => [
                'keywords' => ['hi', 'hello', 'hey', 'start', 'مرحبا', 'مرحباً', 'هلا', 'أهلا', 'اهلين', 'سلام', 'عليكم', 'السلام'],
                'answer_en' => "Hello! Welcome to Shoply. I'm your AI assistant. How can I help you today?",
                'answer_ar' => "أهلاً بك في Shoply! أنا مساعدك الذكي. كيف يمكنني مساعدتك اليوم؟"
            ],
            'developer' => [
                'keywords' => ['name', 'your name', 'who are you', 'developer', 'ibrahim', 'اسمك', 'مين انت', 'من انت', 'مين أنت', 'مين المطور', 'ابراهيم', 'إبراهيم', 'شو اسمك'],
                'answer_en' => "Hello! I'm Ibrahim Khrais, a passionate Laravel developer dedicated to building amazing and fast web experiences. I crafted this site with love and precision. How can I help you today? 😊",
                'answer_ar' => "أهلاً بك! أنا إبراهيم خريس، مطور Laravel شغوف ببناء تجارب ويب مذهلة وسريعة. صممت هذا الموقع ليكون مثالاً على الإبداع والدقة. كيف يمكنني مساعدتك اليوم؟ 😊"
            ],
            'about' => [
                'keywords' => ['who are you', 'about us', 'team', 'owner', 'company', 'من انتم', 'من أنتم', 'عن الموقع', 'الفريق', 'مين صاحب الموقع', 'المطور', 'اداره', 'إدارة'],
                'answer_en' => "Shoply is built by a passionate team: Ibrahim (The Coder), Montaser (Marketing), Abood (Manager), and Opada (UI/UX).",
                'answer_ar' => "Shoply تم تطويره بواسطة فريق مبدع: إبراهيم (المطور)، منتصر (التسويق)، عبود (الإدارة)، وعبادة (التصميم)."
            ],
            'contact' => [
                'keywords' => ['contact', 'email', 'support', 'call', 'phone', 'number', 'تواصل', 'اتصل', 'ايميل', 'رقم', 'دعم', 'هاتف', 'جوال'],
                'answer_en' => "You can contact us via the 'Contact Us' page or email ibrahemsohail.out@gmail.com.",
                'answer_ar' => "يمكنك التواصل معنا عبر صفحة 'تواصل معنا' أو عبر البريد الإلكتروني ibrahemsohail.out@gmail.com."
            ],
            'order' => [
                'keywords' => ['how to order', 'buy', 'shipping', 'payment', 'order', 'كيف اطلب', 'شراء', 'دفع', 'توصيل', 'طريقة الطلب', 'بدي اشتري', 'عايز اشتري'],
                'answer_en' => "Ordering is easy! Just browse products, add them to your cart, and proceed to checkout.",
                'answer_ar' => "الطلب سهل جداً! تصفح المنتجات، أضفها للسلة، ثم انتقل للدفع."
            ],
            'location' => [
                'keywords' => ['where', 'location', 'address', 'اين', 'أين', 'عنوان', 'مكان', 'موقعكم', 'الموقع'],
                'answer_en' => "We are an online store, serving you globally! Our HQ is in the cloud ☁️.",
                'answer_ar' => "نحن متجر إلكتروني نخدمك في كل مكان! مقرنا الرئيسي في السحابة ☁️."
            ]
        ];

        // 2. Check Knowledge Base
        foreach ($knowledgeBase as $category) {
            foreach ($category['keywords'] as $keyword) {
                if (str_contains($message, $keyword)) {
                    return response()->json(['response' => $isArabic ? $category['answer_ar'] : $category['answer_en']]);
                }
            }
        }

        // 2a. Check for Specific "Offers" Query
        $offerKeywords = ['offer', 'deal', 'discount', 'sale', 'عرض', 'عروض', 'خصم', 'تخفيض'];
        $isOfferQuery = false;
        foreach ($offerKeywords as $kw) {
            if (str_contains($message, $kw)) {
                $isOfferQuery = true;
                break;
            }
        }

        if ($isOfferQuery) {
            $offers = Product::whereNotNull('offer_price')->take(5)->get();
            if ($offers->count() > 0) {
                $response = $isArabic ? "نعم! لدينا هذه العروض المميزة لك 🔥:<br>" : "Yes! Check out these amazing deals 🔥:<br>";
                foreach ($offers as $product) {
                    $url = route('products.show', $product->id);
                    $priceVal = number_format($product->price, 2);
                    $offerVal = number_format($product->offer_price, 2);
                    $priceDisplay = "<span class='text-red-500 line-through text-xs'>\${$priceVal}</span> <span class='font-bold text-green-600'>\${$offerVal}</span>";
                    
                    $response .= "- <a href='{$url}' class='text-indigo-600 hover:underline font-semibold'>{$product->name}</a> ({$priceDisplay})<br>";
                }
                return response()->json(['response' => $response]);
            } else {
                return response()->json(['response' => $isArabic ? "للأسف، لا توجد عروض حالياً." : "Sorry, there are no special offers at the moment."]);
            }
        }

        // 3. Smart Product Search
        // Remove common stopwords for better search
        $cleanMessage = str_replace(['do you have', 'i want', 'search for', 'show me', 'price of', 'هل لديكم', 'اريد', 'بدي', 'بحث عن', 'سعر', 'شو سعر'], '', $message);
        $cleanMessage = trim($cleanMessage);

        if (strlen($cleanMessage) > 1) {
             $products = Product::where('name', 'LIKE', "%{$cleanMessage}%")
                ->orWhere('description', 'LIKE', "%{$cleanMessage}%")
                ->orWhereHas('category', function ($query) use ($cleanMessage) {
                    $query->where('name', 'LIKE', "%{$cleanMessage}%");
                })
                ->take(3)
                ->get();

            if ($products->count() > 0) {
                $response = $isArabic ? "وجدنا لك هذه المنتجات المميزة:<br>" : "I found these products for you:<br>";
                foreach ($products as $product) {
                    $url = route('products.show', $product->id);
                    $priceVal = number_format($product->price, 2);
                    $priceDisplay = $product->offer_price 
                        ? "<span class='text-red-500 line-through'>\${$priceVal}</span> <span class='font-bold text-green-600'>\${$product->offer_price}</span>" 
                        : "<span class='font-bold'>\${$priceVal}</span>";
                    
                    $response .= "- <a href='{$url}' class='text-indigo-600 hover:underline font-semibold'>{$product->name}</a> ({$priceDisplay})<br>";
                }
                return response()->json(['response' => $response]);
            }
        }

        // 4. Fallback Response
        $fallback = $isArabic 
            ? "عذراً، لم أفهم سؤالك تماماً. هل يمكنك التوضيح؟ يمكنك البحث عن منتجات مثل 'لابتوب' أو سؤالي 'من أنتم؟'."
            : "I'm sorry, I didn't quite catch that. Could you clarify? You can search for products like 'Laptop' or ask 'Who are you?'.";

        return response()->json(['response' => $fallback]);
    }
}
