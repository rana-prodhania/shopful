<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
 <div class="app-brand demo">
   <a href="index.html" class="app-brand-link">
     <span class="app-brand-text text-uppercase demo menu-text fw-bolder ms-2">Shopful</span>
   </a>
   <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
     <i class="bx bx-chevron-left bx-sm align-middle"></i>
   </a>
 </div>
 {{-- <hr class="mt-0"> --}}
 <div class="menu-inner-shadow"></div>

 <ul class="menu-inner">
   <!-- Dashboard -->
   <li class="menu-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
     <a href="{{ route('admin.dashboard') }}" class="menu-link">
       <i class="menu-icon tf-icons bx bx-home-circle"></i>
       <div data-i18n="Analytics">Dashboard</div>
     </a>
   </li>
   {{-- <li class="menu-header small text-uppercase">
    <span class="menu-header-text" data-i18n="menu">Menu</span>
  </li> --}}
   <li class="menu-item {{ Request::is('admin/category*') ? 'active' : '' }}">
     <a href="{{ route('admin.category.index') }}" class="menu-link">
      <i class="menu-icon tf-icons bx bx-category"></i>
       <div data-i18n="Analytics">Categories</div>
     </a>
   </li>
   <li class="menu-item {{ Request::is('admin/sub-category*') ? 'active' : '' }}">
     <a href="{{ route('admin.sub-category.index') }}" class="menu-link">
      <i class="menu-icon tf-icons bx bx-customize"></i>
       <div data-i18n="Analytics">Sub Categories</div>
     </a>
   </li>
   <li class="menu-item {{ Request::is('admin/brand*') ? 'active' : '' }}">
     <a href="{{ route('admin.brand.index') }}" class="menu-link">
      <i class="menu-icon fs-4 tf-icons bx bx-award"></i>
       <div data-i18n="Analytics">Brands</div>
     </a>
   </li>
   <li class="menu-item {{ Request::is('admin/product*') ? 'active' : '' }}">
     <a href="{{ route('admin.product.index') }}" class="menu-link">
      <i class="menu-icon fs-4 tf-icons bx bx-package"></i>
       <div data-i18n="Analytics">Products</div>
     </a>
   </li>
   <li class="menu-item {{ Request::is('admin/slider*') ? 'active' : '' }}">
     <a href="{{ route('admin.slider.index') }}" class="menu-link">
      <i class="menu-icon fs-4 tf-icons bx bx-slider-alt"></i>
       <div data-i18n="Analytics">Sliders</div>
     </a>
   </li>

   {{-- <li class="menu-item">
     <a href="javascript:void(0);" class="menu-link menu-toggle">
       <i class="menu-icon tf-icons bx bx-cube-alt"></i>
       <div data-i18n="Misc">Misc</div>
     </a>
     <ul class="menu-sub">
       <li class="menu-item">
         <a href="pages-misc-error.html" class="menu-link">
           <div data-i18n="Error">Error</div>
         </a>
       </li>
       <li class="menu-item">
         <a href="pages-misc-under-maintenance.html" class="menu-link">
           <div data-i18n="Under Maintenance">Under Maintenance</div>
         </a>
       </li>
     </ul>
   </li> --}}
   
 </ul>
</aside>