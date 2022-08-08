   @php
       $logo = Utility::get_superadmin_logo();
   @endphp

@if (isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on' || $settings['SITE_RTL'] =='on')
    <nav class="dash-sidebar light-sidebar transprent-bg">
@else
    <nav class="dash-sidebar light-sidebar">
@endif
{{-- <nav class="dash-sidebar light-sidebar {{ (!empty($setting['cust_theme_bg']) && $setting['cust_theme_bg']) == 'off' ? '' : 'transprent-bg' }}"> --}}
{{-- <nav class="dash-sidebar light-sidebar transprent-bg"> --}}
   
    <div class="navbar-wrapper">
        <div class="m-header main-logo">
            <a href="{{ route('home') }}" class="b-brand">
                <!-- ========   change your logo hear   ============ -->              
                <img src="{{ asset(Storage::url('logo/'.$logo)) }}" alt="{{ env('APP_NAME') }}" class="logo logo-lg" />
                <img src="{{ asset(Storage::url('logo/'.$logo)) }}" alt="{{ env('APP_NAME') }}" class="logo logo-sm" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="dash-navbar">
                <li class="dash-item {{ request()->is('*dashboard*') ? ' active' : '' }}">                   
                    <a href="{{ route('home') }}" class="dash-link "><span class="dash-micon"><i class="ti ti-home"></i></span><span class="dash-mtext">{{ __('Dashboard') }}</span></a>
                </li>
                @can('manage-users')
                    <li class="dash-item {{ request()->is('*users*') ? ' active' : '' }}">
                        <a href="{{ route('admin.users') }}" class="dash-link"><span class="dash-micon"><i class="ti ti-users"></i></span><span class="dash-mtext">{{ __('Users') }}</span></a>
                    </li>
                @endcan
                @can('manage-tickets')
                    <li class="dash-item {{ request()->is('*ticket*') ? ' active' : '' }}">
                        <a href="{{ route('admin.tickets.index') }}" class="dash-link"><span class="dash-micon"><i class="ti ti-ticket"></i></span><span class="dash-mtext">{{ __('Tickets') }}</span></a>
                    </li>
                @endcan
                @can('manage-category')
                    <li class="dash-item {{ (\Request::route()->getName()=='admin.category' || \Request::route()->getName()=='admin.category.create' || \Request::route()->getName()=='admin.category.edit') ? ' active' : '' }}">
                        <a href="{{ route('admin.category') }}" class="dash-link"><span class="dash-micon"><i class="ti ti-clipboard-list"></i></span><span class="dash-mtext">{{ __('Category') }}</span></a>
                    </li>
                @endcan 
                @can('manage-faq')
                    @if(Utility::getSettingValByName('FAQ') == 'on') 
                        <li class="dash-item {{ request()->is('*faq*') ? ' active' : '' }}">
                            <a href="{{ route('admin.faq') }}" class="dash-link"><span class="dash-micon"><i class="ti ti-question-mark"></i></span><span class="dash-mtext">{{ __('FAQ') }}</span></a>
                        </li>
                    @endif
                @endcan 
                @if (Utility::getSettingValByName('CHAT_MODULE') == 'yes')
                    <li class="dash-item {{ request()->is('*chat*') ? ' active' : '' }}">
                        <a href="{{ route('admin.chats') }}" class="dash-link"><span class="dash-micon"><i class="ti ti-brand-hipchat"></i></span><span class="dash-mtext">{{ __('Chats') }}</span></a>
                    </li>
                @endif
                @can('manage-knowledge')  
                    @if (Utility::getSettingValByName('Knowlwdge_Base') == 'on')
                        <li class="dash-item {{ request()->is('*knowledge*') ? ' active' : '' }}">
                            <a href="{{ route('admin.knowledge') }}" class="dash-link"><span class="dash-micon"><i class="ti ti-school"></i></span><span class="dash-mtext">{{ __('Knowledge Base') }}</span></a>
                        </li>
                    @endif                       
                @endcan 
                @can('manage-setting')
                    <li class="dash-item {{ request()->is('*setting*') ? ' active' : '' }}">
                        <a href="{{ route('admin.settings.index') }}" class="dash-link"><span class="dash-micon"><i class="ti ti-settings"></i></span><span class="dash-mtext">{{ __('Settings') }}</span></a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</nav>

