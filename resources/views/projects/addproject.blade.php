<x-app-layout>
    <x-slot name="header">
        @if(session()->has('success'))
            <div class="alert-box success">
                {{ session()->get('success') }}
            </div>
        @endif
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Project') }}
        </h2>

        
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div wire:id="sYSWNAbqONQ7XLMEsAqO" wire:initial-data="{&quot;fingerprint&quot;:{&quot;id&quot;:&quot;sYSWNAbqONQ7XLMEsAqO&quot;,&quot;name&quot;:&quot;teams.create-team-form&quot;,&quot;locale&quot;:&quot;en&quot;,&quot;path&quot;:&quot;teams\/create&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;v&quot;:&quot;acj&quot;},&quot;effects&quot;:{&quot;listeners&quot;:[]},&quot;serverMemo&quot;:{&quot;children&quot;:[],&quot;errors&quot;:[],&quot;htmlHash&quot;:&quot;3291a922&quot;,&quot;data&quot;:{&quot;state&quot;:[]},&quot;dataMeta&quot;:[],&quot;checksum&quot;:&quot;d0ccda57aab18fe4db15f08047dde0d20f9f3a6c5d89771f87c4648ea53e4454&quot;}}" class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1 flex justify-between">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">Create a Project to crawl.</h3>

                       
                    </div>
                    <div class="px-4 sm:px-0">
                        
                    </div>
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form method="POST" action="{{ route('projects.addprojects') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    <label class="block font-medium text-sm text-gray-700">Project Owner</label>
                                    <div class="flex items-center mt-2">
                                        <img class="w-12 h-12 rounded-full object-cover" src="https://ui-avatars.com/api/?name=f&amp;color=7F9CF5&amp;background=EBF4FF" alt="fullstack">

                                        <div class="ml-4 leading-tight">
                                            <div>fullstack</div>
                                            <div class="text-gray-700 text-sm">fullstackdeveloper44@gmail.com</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                     @if($errors->has('name'))
                                                <div class="error">{{ $errors->first('name') }}</div>
                                     @endif
                                    <label class="block font-medium text-sm text-gray-700" for="name">Project Name</label>
                                    <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="name" type="text" name="name" autofocus="autofocus">
                                    <br>

                                        @if($errors->has('file'))
                                                <div class="error">{{ $errors->first('file') }}</div>
                                        @endif
                                    <label class="block font-medium text-sm text-gray-700" for="file">Upload file</label>
                                    <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="file" name="file" id="filex">
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Create</button>
                        </div>
                    </form>
                </div>
            </div>

<!-- Livewire Component wire-end:sYSWNAbqONQ7XLMEsAqO -->        
        </div>
    </div>
</x-app-layout>
<script type="text/javascript">
    $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
</script>
