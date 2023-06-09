<div class="container">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            <li class="nav-item">
                <router-link class="nav-link px-2 text-muted" :to="{ name: 'contact' }">
                    Contact
                </router-link>
            </li>
        </ul>
        <p class="text-center text-muted">&copy; {{ date('Y') }} Larablog</p>
    </footer>
</div>
