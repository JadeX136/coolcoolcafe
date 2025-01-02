<div class="col-sm-12 py-5">
    <div class="container">
    
    <nav style="top:75px;z-index:1020;" class=" sticky-top navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid  scrollable-navbar">
        <ul class="navbar-nav flex-row">
           
            <li class="nav-item px-3">
                <a class="nav-link text-theme" href="#recommend">recommend</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link text-theme" href="#coffee">Coffee</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link text-theme" href="#tea">Tea</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link text-theme" href="#soda">Soda</a>
            </li>
           
        </ul>
    </div>
</nav>
<section id="coffee" class="pb-5">
    <div class="col-sm-12">
        <h3 class="text-theme fw-bold">Coffee</h3>
        <div class="row">
        <?php foreach($coffee as $row):?>
            <div class="px-0 col-6 col-sm-3">
            <a class="text-decoration-none text-theme" href="<?php echo base_url("/menu/detail/{$row->product_id}");?>">
                <div style="border-radius:25px;" class="card m-1">
                    <img style="border-radius:25px 25px 0px 0px;" class="card-img-top" src="data:image/jpeg;base64,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">
                    <div class="card-body">
                        <p class="fw-bold"><?php echo $row->nameTH;?><br><?php echo $row->price;?></p>
                    </div>
                </div>
            </a>
            </div>
        <?php endforeach;?>
        </div>
    </div>
</section>
<section id="tea" class="pt-5">
    <div class="col-sm-12">
        <h3 class="text-theme fw-bold">Tea</h3>
        <div class="row">
        <?php foreach($tea as $row):?>
            <div class="col-6 col-sm-3">
            <a class="text-decoration-none text-theme" href="<?php echo base_url("/menu/detail/{$row->product_id}");?>">
                <div style="border-radius:25px;" class="card m-1">
                    <img style="border-radius:25px 25px 0px 0px;" class="card-img-top" src="data:image/jpeg;base64,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">
                    <div class="card-body">
                        <p class="fw-bold"><?php echo $row->nameTH;?><br><?php echo $row->price;?></p>
                    </div>
                </div>
            </a>
            </div>
        <?php endforeach;?>
        </div>
    </div>
</section>
<script>
    window.addEventListener('scroll', function() {
        var sections = document.querySelectorAll('section');
        var navLinks = document.querySelectorAll('nav a');

        sections.forEach(function(section) {
            var sectionTop = section.offsetTop;
            if (window.scrollY >= sectionTop + 100) {
                var currentId = section.getAttribute('id');
                navLinks.forEach(function(link) {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + currentId) {
                        link.classList.add('active');
                    }
                });
            }
        });
    });
</script>
