<nav class="bg-gray-800 shadow-md sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center py-4">
        <div class="flex items-center space-x-4">
            <p class="text-white text-2xl font-semibold flex items-center">
                Consults
            </p>
            <button class="lg:hidden text-white" id="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
            </button>
            @auth()
                @if (Auth::user()->role === 'admin')
                    <x-link route="users.create" message="Add User" />
                @endif
                @if (Auth::user()->role === 'administrative')
                    <x-link route="consults.create" message="Add Consult" />
                @endif
            @endauth
        </div>
        <div class="flex items-center space-x-4">
            @guest
                <x-link route="register" message="Register" />
                <x-link route="login" message="Login" />
            @endguest

            @auth()
                <div class="flex justify-center items-center bg-gray-200 border border-black px-4 rounded-md">
                    <img class="w-8 h-8 rounded-full mr-2"
                        src="https://api.dicebear.com/6.x/avataaars/svg?seed={{ Auth::user()->name ?? 'default' }}"
                        alt="{{ Auth::user()->name ?? 'User' }} Avatar">
                    <span class="text-black px-4 py-2">{{ Auth::user()->name ?? 'Guest' }} -
                        {{ Auth::user()->role ?? 'Guest' }}</span>
                </div>

                <x-link route="logout" message="Log out" />
            @endauth
        </div>
    </div>
</nav>
