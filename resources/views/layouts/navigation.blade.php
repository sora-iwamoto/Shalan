<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 w-full nav">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home_index') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('home_index')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link class="js-modal-open">
                        {{ __('Post') }}
                    </x-nav-link>
                    <x-nav-link :href="route('message_home')" class="">
                        {{ __('Message') }}
                    </x-nav-link>
                    <x-nav-link :href="route('calendar_index')" class="">
                    </x-nav-link>    
                    <x-nav-link :href="route('calendar_index')">
                        {{ __('Calendar') }}
                    </x-nav-link>
                    <x-nav-link :href="route('mypage_index')" class="">
                        {{ __('MyPage') }}
                    </x-nav-link>
                </div>
                
                <!--ユーザー検索-->
                <form method="GET" action="{{route('search_index')}}" class="userSearchForm">
                    <input type="text" class="userSearch" name="searchName" />
                </form>
            </div>

            <!--Settings Dropdown -->
            

        </div>
    </div>
</nav>
