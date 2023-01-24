<style>
   body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
   }
   * {
      box-sizing: border-box;
   }
   .openChatBtn {
      background-color: rgb(123, 28, 179);
      color: white;
      padding: 16px 20px;
      border: none;
      font-weight: 500;
      font-size: 18px;
      cursor: pointer;
      opacity: 0.8;
      position: fixed;
      bottom: 23px;
      right: 28px;
      width: 280px;
   }
   .openChat {
      display: none;
      position: fixed;
      bottom: 0;
      right: 15px;
      border: 3px solid #ff08086b;
      z-index: 9;
   }
   .chat-form {
      max-width: 300px;
      padding: 10px;
      background-color: white;
   }
   .chat-form textarea {
      width: 100%;
      font-size: 18px;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      font-weight: 500;
      background: #d5e7ff;
      color: rgb(0, 0, 0);
      resize: none;
      min-height: 200px;
   }
   .chat-form textarea:focus {
      background-color: rgb(219, 255, 252);
      outline: none;
   }
   .chat-form .btn {
      background-color: rgb(34, 197, 107);
      color: white;
      padding: 16px 20px;
      font-weight: bold;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom: 10px;
      opacity: 0.8;
   }
   .chat-form .close {
      background-color: red;
   }
   .chat-form .btn:hover, .openChatBtn:hover {
      opacity: 1;
   }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <x-jet-welcome />
            <button class="openChatBtn" onclick="openForm()">Chat</button>
                <div class="openChat">
                <div class="chat-form">
                    <h1>Chat</h1>
                    <label for="msg"><b>Message</b></label>
                    <textarea placeholder="Type message.." name="msg" id="msg" required></textarea>
                    <div id="res"></div>
                    <button type="button" class="btn" onclick="handleOnsubmit()" >Send</button>
                    <button type="button" class="btn close" onclick="closeForm()">
                    Close
                    </button>
                </div>
                </div>
                <script>


                function handleOnsubmit() {
                let data = $("#msg").val();


                $.ajax({
                                url: "{{ route('write.generate') }}",
                                type: "post",
                                data: {"data":data,
                                    "_token": "{{ csrf_token() }}"
                                    },
                                success: function(d) {
                                $("#res").html('<div class="response">'+d+'</div>');
                                }
                            });


                    
                }

                document .querySelector(".openChatBtn") .addEventListener("click", openForm);
                document.querySelector(".close").addEventListener("click", closeForm);
                function openForm() {
                    document.querySelector(".openChat").style.display = "block";
                }
                function closeForm() {
                    document.querySelector(".openChat").style.display = "none";
                }


                </script>
            </div>
        </div>
    </div>
</x-app-layout>
