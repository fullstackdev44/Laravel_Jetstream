<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
   body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
   }
   * {
      box-sizing: border-box;
   }
   .openChatBtn {
      background-color: #6875f5;
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
      border: 3px solid #6875f5;
      z-index: 9;
      width: 30%;
   }
   .chat-form {
      max-width: 400px;
      padding: 10px;
      background-color: white;
   }
   div#chatdata {
    min-height: 400px;
    max-height: 400px;
    overflow-y: scroll;
}
   /* .chat-form textarea {
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
   } */
   /* .chat-form textarea:focus {
      background-color: rgb(219, 255, 252);
      outline: none;
   } */
   .chat-form .btn {
      background-color: #6875f5;
      color: white;
      padding: 10px 10px;
      font-weight: bold;
      border: none;
      cursor: pointer;
      width: 20%;
      margin-bottom: 10px;
      opacity: 0.8;
      float: right;
   }
   .chat-form .close {
      background-color: red;
   }
   .chat-form .btn:hover, .openChatBtn:hover {
      opacity: 1;
   }
   .response {
    font-size: small;
    padding: 3px;
}
input#msg {
    width: 80%;
    height: 40px;
    float: left;
}

.questions {
    float: left;
    color: indianred;
    background-color: lightcyan;
    padding: 12px;
    margin: 10px;
}


.answer {
    float: right;
    color: green;
    font-size: 13px;
    background-color: azure;
    padding: 10px;
    margin: 10px;
}
</style>
  
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @foreach($data as $user)
{{$user['name']}}
@endforeach
        
        </h2>

    </x-slot>


<div class="py-12">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    Crawl Status of this Project Will be Shown Here...
</div>
</div>
<button class="openChatBtn" onclick="openForm()">Ask Me Questions</button>
                <div class="openChat">
                <div class="chat-form">
                    <!-- <h1>Chat</h1> -->
                    <label for="msg"><b>Message</b></label>
               
                   
                    <div id="chatdata"></div>
                 
                    <input placeholder="Type message.." name="msg" id="msg" required></input>
                    <button type="button" class="btn handleOnsubmit" ><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    <!-- <button type="button" class="btn close" onclick="closeForm()">
                    Close
                    </button> -->
                </div>
                </div>
                <script>
                    
                    document .querySelector(".handleOnsubmit") .addEventListener("click", handleOnsubmit);

                function handleOnsubmit() {

                      //questions session start
                      let questions = $("#msg").val();
                let data = JSON.parse(sessionStorage.getItem('data')) || []        
                data.push({questions:questions})
                sessionStorage.setItem('data',JSON.stringify(data))
//questions session end
 
//asnwer session start


                $.ajax({
                                url: "{{ route('write.generate') }}",
                                type: "post",
                                data: {"data":questions,
                                    "_token": "{{ csrf_token() }}"
                                    },
                                success: function(d) {
                                    data.push({answer:d})
                sessionStorage.setItem('data',JSON.stringify(data))
                $("#msg").val("");
                datashow()
                                }
                            });

                            
                }
                

                document .querySelector(".openChatBtn") .addEventListener("click", openForm);
                document.querySelector(".close") .addEventListener("click", closeForm);
                function openForm() {
                    document.querySelector(".openChat").style.display = "block";
                    document.querySelector(".openChatBtn").style.display = "none";
                    datashow()
                }
                function closeForm() {
                    document.querySelector(".openChat").style.display = "none";
                    document.querySelector(".openChatBtn").style.display = "block";
                }

function datashow(){
    let data = JSON.parse(sessionStorage.getItem('data'))
    let chatdata = ""
  
    data.forEach(element => {
        
       if (element.questions) {
        chatdata+=  '<span class="questions" >'+element.questions+'</span><br/>';
        
       } else {
        chatdata +=  '<span class="answer" >'+element.answer+'</span><br/>';
       }
       
    
});
document.getElementById("chatdata").innerHTML = chatdata;
    
}
        

                </script>

</x-app-layout>
