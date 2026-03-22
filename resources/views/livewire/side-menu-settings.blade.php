<div class="accordion accordion-flush" id="accordionFlushExample" wire:ignore>
    <div class="accordion-item py-2">
        <h2 class="accordion-header">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                {{__('Home')}}
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li>
                        <a href="#"
                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">{{__('Overview')}}</a>
                    </li>
                    <li>
                        <a href="#"
                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">{{__('Updates')}}</a>
                    </li>
                    <li>
                        <a href="#"
                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">{{__('Reports')}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion-item py-2">
        <h2 class="accordion-header">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                {{__('Dashboard')}}
            </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">                    
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li>
                        <a href="{{ route('measurement') }}"
                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">{{__('Measurement')}}</a>
                    </li>
                    <li>
                        <a href="#"
                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">{{__('Weekly')}}</a>
                    </li>
                    <li>
                        <a href="#"
                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">{{__('Monthly')}}</a>
                    </li>
                    <li>
                        <a href="#"
                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">{{__('Annually')}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion-item py-2">
        <h2 class="accordion-header">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                {{__('Templates')}}
            </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li>
                        <a href="{{ route('create-template') }}"
                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">{{__('New template')}}</a>
                    </li>
                    <li>
                        <a href="{{ route('templates-list')}}"
                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">{{__('All templates')}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion-item py-2">
        <h2 class="accordion-header">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                {{__('Account')}}
            </button>
        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li>
                        <a href="{{route('register/new-user')}}"
                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">{{__('New...')}}</a>
                    </li>
                    <li>
                        <a href="{{ route('personal-settings') }}"
                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">{{__('Profile')}}</a>
                    </li>
                    <li>
                        <a href="{{route('change-password')}}"
                            class="link-body-emphasis d-inline-flex text-decoration-none rounded">{{__('Change Password')}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded" 
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{__('Sign out')}}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>