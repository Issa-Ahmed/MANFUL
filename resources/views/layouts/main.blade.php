<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>@yield('title')</title>
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
 {{-- Font awesome cdn --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen">

  <!-- Navbar start-->
    <div class="nav bg-white font-dancing">
      <nav class="flex justify-between items-center h-20">
        <!-- Logo -->
        <div class="flex items-center ml-8 text-3xl font-bold">
         <h2 class="">ManFul</h2>
         <ul
           class="pl-10 space-x-12 text-lg font-semibold outline-none items-center hidden md:flex"
         >
           <li class="">
             <a href="#">Home</a>
           </li>
           <li class="">
             <a href="#">Shop</a>
           </li>
           <li class="">
             <a href="#">Contact</a>
           </li>
         </ul>
        </div>
        <!-- Nav Items -->
        {{-- Search ,dropdown and cart --}}
        <ul class="flex items-center md:space-x-10 mr-6">
          <!-- Mobile Hamburger menu -->
          <li class="md:hidden mr-5" id="btnMobile">
            <a href="#" class="text-2xl"><i class="fa-solid fa-bars"></i></a>
          </li>

          {{-- Search --}}
          <div class="hidden md:block">
              <form action="">
                 <input type="search" name="search" id="" class="h-8 w-52 rounded shadow-md border-gray-300 focus:border-gray-300 focus:ring focus:ring-gray-200" placeholder="Search...">
                   <button type="submit" class="bg-black text-white px-3 py-1 -ml-1 h-8 shadow-md"><i class="fa fa-search"></i></button>
              </form>
          </div>
  
    {{-- Dropdown --}}
    <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center justify-center text-lg font-medium drop-shadow-lg w-24  focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                         
                            <div class="flex">
                              <svg aria-hidden="true" class=" flex-shrink-0 w-6 h-6 text-amber-800 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                             Account</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                      @if(Auth::user())
                      <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{-- {{ __('Log Out') }} --}}
                                 <button type="submit" class="text-center w-full bg-black text-white px-2 py-2 rounded shadow-sm text-md">Log out</button>
                            </x-dropdown-link>
                        </form>
                      @else
                       <x-dropdown-link :href="route('login')">
                      <button type="submit" class="text-center w-full bg-black text-white px-2 py-2 rounded shadow-sm text-md">Sign In</button>
                     </x-dropdown-link>
                      @endif

                     <x-dropdown-link>
                      <button class="flex items-end" type="submit">
                       <svg aria-hidden="true" class="mr-1 flex-shrink-0 w-6 h-6 text-amber-500 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                       My Account
                      </button>
                     </x-dropdown-link>
                     <x-dropdown-link >
                       <button class="flex items-end" type="submit">
                       <svg aria-hidden="true" class="mr-1 flex-shrink-0 w-6 h-6 text-green-500 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                       Orders
                      </button>
                     </x-dropdown-link>
                     <x-dropdown-link >
                       <button class="flex items-end" type="submit">
                      <div><i class="fa-solid fa-heart text-lg text-rose-400 mr-2"></i></div>
                       Wishlist
                      </button>
                     </x-dropdown-link>
                     
                    </x-slot>
                    
                </x-dropdown>
            </div>

          {{-- Cart --}}
          <li title="Cart">
            <a href="{{route('cart.list')}}"
              ><i class="fa-solid fa-cart-shopping text-2xl"></i>
              <span
                class="absolute top-4 right-3 w-5 h-5 text-sm bg-green-600 rounded-full text-center text-white animate-pulse"
                >0</span
              >
            </a>
          </li>
        </ul>
      </nav>
    </div>

    <!-- Mobile navigation -->
    <div
      class="md:invisible fixed right-0 w-60 h-96 bg-gray-200 z-50 translate-x-64 transition-transform shadow-md rounded-md text-center"
     id="mobileNav"
      >
    <nav>
      <ul class="pt-5 pl-4 text-lg">
        <a href="#" class="focus:font-bold"><li class="py-2">My Profile </li></a>
        <a href="#" class="focus:font-bold"><li class="py-2">Home</li></a>
        <a href="#" class="focus:font-bold"><li class="py-2">Shop</li></a>
        <a href="#" class="focus:font-bold"><li class="py-2">Orders</li></a>
        <a href="#" class="focus:font-bold"><li class="py-2">Wishlist</li></a>
        @if (Auth::user())
        <a href="#" class="focus:font-bold"><li class="py-2">Log Out</li></a>
         @else   
         <a href="#" class="focus:font-bold"><li class="py-2">Sign In</li></a>
        @endif
      </ul>
    </nav>
  </div>
    <!-- Navbar end -->

 @yield('content')
 {{-- Footer --}}
  <!-- Footer -->
    <section class="flex h-80 font-dancing border-t-2 border-white text-white bg-black">
     <div class="h-full w-1/3">
      <h2 class="text-5xl font-bold ml-12 mt-12">ManFul</h2>
      <p class="ml-12 pt-2">&copy; Copyright, 2022.</p>
     </div>
     <div class="grid grid-cols-3 h-full w-2/3">
      <div class="flex flex-col items-center mt-12">
       <h4 class="text-3xl pb-5 opacity-10">Company</h4>
       <ul class="space-y-4 flex flex-col">
        <a href="#">Privacy Policy</a>
        <a href="#">About Us</a>
        <a href="#">Contact Us</a>
       </ul>
      </div>
      <div class="flex flex-col items-center mt-12">
       <h4 class="text-3xl pb-5 opacity-10">Quick Links</h4>
       <ul class="space-y-4 flex flex-col">
        <a href="#">Returns</a>
        <a href="#">Shipping</a>
        <a href="#">Orders</a>
       </ul>
      </div>
      <div class="flex flex-col items-center mt-12">
       <h4 class="text-3xl pb-5 opacity-10">Follow Us</h4>
       <ul class="space-y-4 flex flex-col">
        <a href="#">Instagram</a>
        <a href="#">Facebook</a>
        <a href="#">Twitter</a>
       </ul>
      </div>
     </div>
    </section>

 <script>
const btnMobile = document.getElementById('btnMobile');
const mobileNav = document.getElementById('mobileNav');

btnMobile.addEventListener('click', function(){
  mobileNav.classList.toggle('translate-x-0')
})

// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();

// Update the count down every 1 second
let x = setInterval(function() {

  // Get today's date and time
  let now = new Date().getTime();

  // Find the distance between now and the count down date
  let distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  let days = Math.floor(distance / (1000 * 60 * 60 * 24));
  let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  let seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
 </script>
</body>
</html>