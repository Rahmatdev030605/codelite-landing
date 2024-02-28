    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
        <div class="c-sidebar-brand d-lg-down-none">
            <img src="{{ asset('img/brand/codelite.png')}}" alt="" width="250" height="104">
            {{-- <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('img/brand/coreui.svg#full') }}"></use>
            </svg>
            <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('img/brand/coreui.svg#signet') }}"></use>
            </svg> --}}
        </div><!--c-sidebar-brand-->

        <ul class="c-sidebar-nav">
            <li class="c-sidebar-nav-item">
                <x-utils.link class="c-sidebar-nav-link main" :href="route('admin.dashboard')" :active="activeClass(Route::is('admin.dashboard'), 'c-active')" icon="c-sidebar-nav-icon cil-speedometer" :text="__('Dashboard')" />
            </li>


            @if (
            $logged_in_user->hasAllAccess() ||
            (
            $logged_in_user->can('admin.access.user.list') ||
            $logged_in_user->can('admin.access.user.deactivate') ||
            $logged_in_user->can('admin.access.user.reactivate') ||
            $logged_in_user->can('admin.access.user.clear-session') ||
            $logged_in_user->can('admin.access.user.impersonate') ||
            $logged_in_user->can('admin.access.user.change-password')
            )
            )
            <li class="c-sidebar-nav-title">@lang('System')</li>



            @if ($logged_in_user->hasAllAccess())
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link href="#" icon="c-sidebar-nav-icon cil-list" class="c-sidebar-nav-dropdown-toggle main" :text="__('Logs')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('log-viewer::dashboard')" class="c-sidebar-nav-link" :text="__('Dashboard')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('log-viewer::logs.list')" class="c-sidebar-nav-link" :text="__('Logs')" />
                    </li>
                </ul>
            </li>
            @endif

            @if ($logged_in_user->hasAllAccess())
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon cil-library"
                class="c-sidebar-nav-dropdown-toggle main"
                :text="__('Sections')" />

                <ul class="c-sidebar-nav-dropdown-items listSub">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-hero')"
                        :active="activeClass(Route::is('admin.get-hero'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Hero')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-our-service')"
                        :active="activeClass(Route::is('admin.get-our-service'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Our Services')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-our-team')"
                        :active="activeClass(Route::is('admin.get-our-team'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Our Team')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-our-model')"
                        :active="activeClass(Route::is('admin.get-our-model'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Our Model')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-our-company')"
                        :active="activeClass(Route::is('admin.get-our-company'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Our Company')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-our-pricing')"
                        :active="activeClass(Route::is('admin.get-our-pricing'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Our Pricing')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-our-true')"
                        :active="activeClass(Route::is('admin.get-our-true'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Our True Words')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-what-offering')"
                        :active="activeClass(Route::is('admin.get-what-offering'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('What We`re Offering')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-leadership')"
                        :active="activeClass(Route::is('admin.get-leadership'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Leadership')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-assistance')"
                        :active="activeClass(Route::is('admin.get-assistance'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Assistance')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-project-section')"
                        :active="activeClass(Route::is('admin.get-project-section'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Projects')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-featured-product')"
                        :active="activeClass(Route::is('admin.get-featured-product'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Featured Product')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-case-studies')"
                        :active="activeClass(Route::is('admin.get-case-studies'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Case Studies')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-consulting')"
                        :active="activeClass(Route::is('admin.get-consulting'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Consulting')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-article-section')"
                        :active="activeClass(Route::is('admin.get-article-section'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Article')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-started')"
                        :active="activeClass(Route::is('admin.get-started'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Lets get started')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-our-team')"
                        :active="activeClass(Route::is('admin.get-our-team'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Testimony')" />
                    </li>

                </ul>
            </li>

            </li>
            @endif

            @if ($logged_in_user->hasAllAccess())
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon cil-building"
                class="c-sidebar-nav-dropdown-toggle main"
                :text="__('Company')" />

                <ul class="c-sidebar-nav-dropdown-items listSub ">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-our-team')"
                        :active="activeClass(Route::is('admin.get-our-team'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Contact')" />
                    </li>

                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-our-team')"
                        :active="activeClass(Route::is('admin.get-our-team'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Career')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-teams')"
                        :active="activeClass(Route::is('admin.get-teams'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Team')" />
                    </li>

                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.partnerView')"
                        :active="activeClass(Route::is('admin.partnerView'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Partner')" />
                    </li>

                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.productView')"
                        :active="activeClass(Route::is('admin.productView'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Product')" />
                    </li>

                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.service')"
                        :active="activeClass(Route::is('admin.service'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('Service')" />
                    </li>
                </ul>
            </li>
            @endif

            @if ($logged_in_user->hasAllAccess())
            <li class="c-sidebar-nav-dropdown main">
                 <x-utils.link
                icon="c-sidebar-nav-icon cil-file"
                :href="route('admin.get-our-team')"
                :active="activeClass(Route::is('admin.get-our-team'), 'c-active')"
                class="c-sidebar-nav-link"
                :text="__('Career')" />
            </li>
            @endif

            @if ($logged_in_user->hasAllAccess())
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon cil-settings"
                class="c-sidebar-nav-dropdown-toggle main"
                :text="__('Setting')" />
                <ul class="c-sidebar-nav-dropdown-items listSub">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-our-team')"
                        :active="activeClass(Route::is('admin.get-our-team'), 'c-active')"
                        class="c-sidebar-nav-link list"
                        :text="__('Logo')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-our-team')"
                        :active="activeClass(Route::is('admin.get-our-team'), 'c-active')"
                        class="c-sidebar-nav-link list"
                        :text="__('Overview')" />
                            </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.contact')"
                        :active="activeClass(Route::is('admin.contact'), 'c-active')"
                        class="c-sidebar-nav-link list"
                        :text="__('Contact Info')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-our-team')"
                        :active="activeClass(Route::is('admin.get-our-team'), 'c-active')"
                        class="c-sidebar-nav-link list"
                        :text="__('Address')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.medsos')"
                        :active="activeClass(Route::is('admin.medsos'), 'c-active')"
                        class="c-sidebar-nav-link list"
                        :text="__('Sosmed')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.get-our-team')"
                        :active="activeClass(Route::is('admin.get-our-team'), 'c-active')"
                        class="c-sidebar-nav-link list"
                        :text="__('How We Go')" />
                    </li>
                    <li class="c-sidebar-nav-dropdown">
                        <x-utils.link
                        href="#"
                        icon=""
                        class="c-sidebar-nav-dropdown-toggle custom-icon"
                        :text="__('General Setting')" />
                        <ul class="c-sidebar-nav-dropdown-items listSub">
                            <li class="c-sidebar-nav-item">
                            <x-utils.link
                            :href="route('admin.get-page-type')"
                            :active="activeClass(Route::is('admin.get-page-type'), 'c-active')"
                            class="c-sidebar-nav-link list"
                            :text="__('Type Page')" />
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            @endif

            @if ($logged_in_user->hasAllAccess())
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon cil-puzzle"
                class="c-sidebar-nav-dropdown-toggle main"
                :text="__('Additional Features')" />

                <ul class="c-sidebar-nav-dropdown-items listSub">
                    <li class="c-sidebar-nav-itemPo">
                        <x-utils.link
                        :href="route('admin.service')"
                        :active="activeClass(Route::is('admin.service'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('CTA')" />
                    </li>

                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.service')"
                        :active="activeClass(Route::is('admin.service'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('FAQ')" />
                    </li>

                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.service')"
                        :active="activeClass(Route::is('admin.service'), 'c-active')"
                        class="c-sidebar-nav-link"
                        :text="__('email subscription')" />
                    </li>
                </ul>
            </li>
            @endif


            <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
                <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon cil-user"
                class="c-sidebar-nav-dropdown-toggle dropAccess"
                :text="__('User & Permission Management')"/>

                <ul class="c-sidebar-nav-dropdown-items listSub">
                    @if (
                    $logged_in_user->hasAllAccess() ||
                    (
                    $logged_in_user->can('admin.access.user.list') ||
                    $logged_in_user->can('admin.access.user.deactivate') ||
                    $logged_in_user->can('admin.access.user.reactivate') ||
                    $logged_in_user->can('admin.access.user.clear-session') ||
                    $logged_in_user->can('admin.access.user.impersonate') ||
                    $logged_in_user->can('admin.access.user.change-password')
                    )
                    )
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.auth.user.index')"
                        class="c-sidebar-nav-link"
                        :text="__('User Management')"
                        :active="activeClass(Route::is('admin.auth.user.*'), 'c-active')" />
                    </li>
                    @endif

                    @if ($logged_in_user->hasAllAccess())
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        :href="route('admin.auth.role.index')"
                        class="c-sidebar-nav-link"
                        :text="__('Role Management')"
                        :active="activeClass(Route::is('admin.auth.role.*'), 'c-active')" />
                    </li>
                    @endif
                </ul>
            </li>
            @endif
        </ul>

        <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div><!--sidebar-->

