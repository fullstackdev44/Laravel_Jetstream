<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

        <title>Writebot - AI Writing Assistant for Bloggers</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            body {
                font-family: 'Space Grotesk', sans-serif;
            }
            .title:empty:before {
                content:attr(data-placeholder);
                color:gray
            }

        </style>

        <script src="https://unpkg.com/marked" defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
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

    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl w-full mx-auto sm:px-6 lg:px-8 space-y-4 py-4">
                <div class="text-center text-gray-800 dark:text-gray-300 py-4">
                    <h1 class="text-7xl font-bold">Writebot</h1>
                </div>

                <div class="w-full rounded-md bg-white border-2 border-gray-600 p-4 min-h-[60px] h-full text-gray-600">
                    <form action="/write/generate" method="post" class="inline-flex gap-2 w-full">
                        @csrf
                        <input required name="title" class="w-full outline-none text-2xl font-bold" placeholder="Type your article title..." />
                        <button class="rounded-md bg-emerald-500 px-4 py-2 text-white font-semibold">Generate</button>
                    </form>
                </div>
                <div class="w-full rounded-md bg-white border-2 border-gray-600 p-4 min-h-[720px] h-full text-gray-600">
                    <textarea class="min-h-[720px] h-full w-full outline-none" spellcheck="false">{{ $content }}</textarea>
                </div>
            </div>
        </div>

        <h1>Popup Chat Window Example</h1>
<h2>Click the below button to start chatting</h2>
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
    </body>
</html>