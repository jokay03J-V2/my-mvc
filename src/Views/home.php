<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">mvc template</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
    <h2 class="text-center">Fully mvc</h2>
    <ul>
        <li>Router</li>
        <li>Custom <code>Response</code></li>
        <li>Controller</li>
        <li>View</li>
        <li><code>RessourceManager</code>(for load js and css correctly)</li>
    </ul>
    <form action="/" method="POST">
        <input type="submit" value="Test with post request and custom response" class="btn btn-primary">
    </form>
</main>
<?php
// Load js or css file
$ressources->css("css/cssfile.css");
$ressources->js("js/jsFile.js");
?>