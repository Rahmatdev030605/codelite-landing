<!-- Header Bar -->
<div class="header-bar">
  <div class="custom-container">
    <div class="header-bar-body d-flex align-items-center justify-content-between">


      <div class="right">
        @guest
        <p>
          Level up your business with
          <x-utils.link :href="route('frontend.index')" :text="appName()" class="navbar-brand" data-word="CODELITE" id="dataWord" /> |
          <x-utils.link :href="route('frontend.auth.login')" :active="activeClass(Route::is('frontend.auth.login'))" :text="__('LOGIN')" /> |

          @if (config('boilerplate.access.user.registration'))
          <x-utils.link :href="route('frontend.auth.register')" :active="activeClass(Route::is('frontend.auth.register'))" :text="__('REGISTER')" />
          @endif
        </p>
        @else
        <img class="rounded-circle" style="max-height: 20px" src="{{ $logged_in_user->avatar }}" />
        {{ $logged_in_user->name }} <span class="caret"></span>

        @if ($logged_in_user->isAdmin())
        <x-utils.link :href="route('admin.dashboard')" :text="__('Administration')" class="navbar-brand" />
        @endif

        @if ($logged_in_user->isUser())
        <x-utils.link :href="route('frontend.user.dashboard')" :active="activeClass(Route::is('frontend.user.dashboard'))" :text="__('Dashboard')" class="navbar-brand" />
        @endif

        <x-utils.link :href="route('frontend.user.account')" :active="activeClass(Route::is('frontend.user.account'))" :text="__('My Account')" class="navbar-brand" />

        <x-utils.link :text="__('Logout')" class="navbar-brand" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <x-slot name="text">
            @lang('Logout')
            <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
          </x-slot>
        </x-utils.link>
        @endguest

      </div>
    </div>
  </div>
</div>