<footer class="article-container-footer" >
    {{-- position-absolute bottom-0 w-100 --}}
    <a href="{{ url('index') }}" class="text-decoration-none">
        <button class="button is-ghost text-secondary d-flex flex-column justify-content-between align-items-center">
            <i class="fa fa-home fs-4 me-1"></i>
            <span>Home</span>
        </button>
    </a>
    <a href="{{ url('knowledge') }}" class="text-decoration-none">
        <button class="button is-ghost text-secondary d-flex flex-column justify-content-between align-items-center">
            <i class="fa fa-newspaper-o fs-4 me-1"></i>
            <span>Knowledge</span>
        </button>
    </a>
    <button class="button is-ghost text-secondary d-flex flex-column justify-content-between align-items-center">
    <i class="fa fa-heart fs-4 me-1"></i>
    <span>Request</span>
    <a href="{{ url('profile') }}" class="text-decoration-none">
        <button class="button is-ghost text-secondary d-flex flex-column justify-content-between align-items-center " >
            <i class="fa fa-user fs-4 me-1"></i>
            <span>Profile</span>
        </button>
    </a>
</footer>
