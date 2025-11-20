<header class="bg-gray-300 shadow">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-18 items-center justify-between">
          <div class="flex items-center">
            <a href="#" class="shrink-0">
              <img src="storage/asset/logo-demgarage.png" alt="DEGarage" class="h-12" />
            </a>
          </div>
          <div class="md:block">
            <div class="ml-4 flex items-center md:ml-6">
              <!-- Profile dropdown -->
              <el-dropdown class="relative ml-3">
                <button class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                <span class="hover:bg-white/20 rounded-full absolute -inset-1.5"></span>
                <span class="sr-only">Open user menu</span>
                <img src="storage/asset/logo-user.svg" alt="User" class="size-8 rounded-full outline -outline-offset-1 outline-white/10" />
                </button>
                <el-menu anchor="bottom end" popover class="w-48 origin-top-right rounded-md bg-white py-1 shadow-lg outline-1 outline-black/5 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden">Your profile</a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden">Settings</a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden">Log out</a>
                </el-menu>
              </el-dropdown>
            </div>
          </div>
        </div>
      </div>
    </header>
