<div x-data="{ 
    open: false, 
    messages: [], 
    newMessage: '', 
    loading: false,
    sendMessage() {
        let text = this.newMessage.trim();
        if (!text) return;

        // Add User Message
        this.messages.push({ id: Date.now(), sender: 'user', text: text });
        this.newMessage = '';
        this.loading = true;

        // Scroll to bottom
        this.$nextTick(() => {
            const chatContainer = document.getElementById('chat-messages');
            chatContainer.scrollTop = chatContainer.scrollHeight;
        });

        // Call API
        fetch('{{ route("chatbot.handle") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ message: text })
        })
        .then(res => res.json())
        .then(data => {
            this.messages.push({ id: Date.now() + 1, sender: 'ai', text: data.response });
        })
        .catch(err => {
            this.messages.push({ id: Date.now() + 1, sender: 'ai', text: 'Sorry, something went wrong. Please try again.' });
        })
        .finally(() => {
            this.loading = false;
            this.$nextTick(() => {
                const chatContainer = document.getElementById('chat-messages');
                chatContainer.scrollTop = chatContainer.scrollHeight;
            });
        });
    }
}" class="fixed bottom-6 right-6 z-50 flex flex-col items-end pointer-events-none">
    
    <!-- Chat Window -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 scale-95"
         class="bg-white pointer-events-auto rounded-2xl shadow-2xl w-80 sm:w-96 mb-4 overflow-hidden border border-gray-100 flex flex-col"
         style="max-height: 500px; display: none;">
        
        <!-- Header -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-4 flex justify-between items-center text-white">
            <div class="flex items-center gap-3">
                <div class="bg-white/20 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-sm">Shoply Assistant</h3>
                    <p class="text-xs text-indigo-100 opacity-90">Online</p>
                </div>
            </div>
            <button @click="open = false" class="text-white/80 hover:text-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Body -->
        <div class="p-4 bg-gray-50 h-80 overflow-y-auto flex flex-col gap-3" id="chat-messages">
            <!-- Initial Message -->
            <div class="flex items-start gap-2.5">
                <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center shrink-0">
                    <span class="text-xs font-bold text-indigo-600">AI</span>
                </div>
                <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-3 border-gray-200 bg-white rounded-e-xl rounded-es-xl shadow-sm">
                   <p class="text-sm font-normal text-gray-900">Hello! 👋 I'm here to help you find the best products. Try asking "Do you have laptops?"</p>
                </div>
            </div>

            <!-- Messages Loop -->
            <template x-for="msg in messages" :key="msg.id">
                <div :class="msg.sender === 'user' ? 'flex flex-row-reverse items-start gap-2.5' : 'flex items-start gap-2.5'">
                    <!-- Avatar -->
                    <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0"
                         :class="msg.sender === 'user' ? 'bg-indigo-600' : 'bg-indigo-100'">
                        <span class="text-xs font-bold" :class="msg.sender === 'user' ? 'text-white' : 'text-indigo-600'" x-text="msg.sender === 'user' ? 'Me' : 'AI'"></span>
                    </div>
                    
                    <!-- Bubble -->
                    <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-3 shadow-sm"
                         :class="msg.sender === 'user' ? 'bg-indigo-600 rounded-s-xl rounded-ee-xl text-white' : 'bg-white rounded-e-xl rounded-es-xl border-gray-200 text-gray-900'">
                        <p class="text-sm font-normal" x-html="msg.text"></p>
                    </div>
                </div>
            </template>

            <!-- Loading Indicator -->
             <div x-show="loading" class="flex items-start gap-2.5">
                <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center shrink-0">
                    <span class="text-xs font-bold text-indigo-600">AI</span>
                </div>
                <div class="bg-white p-3 rounded-e-xl rounded-es-xl shadow-sm">
                    <div class="flex space-x-1">
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce [animation-delay:-0.3s]"></div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce [animation-delay:-0.15s]"></div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="p-3 bg-white border-t border-gray-100">
            <form @submit.prevent="sendMessage()" class="flex items-center gap-2">
                <input x-model="newMessage" type="text" placeholder="Type your message..." 
                       class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block p-2.5 outline-none"
                       :disabled="loading">
                <button type="submit" class="inline-flex justify-center p-2 text-indigo-600 rounded-full cursor-pointer hover:bg-indigo-100" :disabled="loading || newMessage.trim() === ''">
                    <svg class="w-5 h-5 rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <!-- Toggle Button -->
    <button @click="open = !open" 
            class="pointer-events-auto bg-gradient-to-tr from-indigo-600 to-purple-600 text-white p-4 rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition duration-300 flex items-center justify-center group relative w-14 h-14">
        
        <!-- Open Icon -->
        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
        </svg>

        <!-- Close Icon -->
        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>

        <!-- Notification Badge -->
        <span class="absolute top-0 right-0 w-3 h-3 bg-red-500 rounded-full border-2 border-white" x-show="!open"></span>
    </button>
</div>
