{{-- ✅ NEW WEBSITE FOOTER (LIKE YOUR IMAGE) --}}
<footer class="spi-footer">

    {{-- TOP FOOTER --}}
    <div class="spi-footer-top">
        <div class="container-fluid">
            <div class="row spi-footer-row">

                {{-- ABOUT US --}}
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <h4 class="spi-footer-title">About Us</h4>
                    <p class="spi-footer-text">
                        The Saint Paul Institute is the only Catholic Higher Education Institution in Cambodian,
                        founded in 2009 by Bishop Olivier Schmitthauserl under the support of a Singaporean lady
                        Ms. Peggy Goh.
                    </p>

                    <div class="spi-social">
                        <a href="#" class="spi-social-btn" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="spi-social-btn" title="Telegram"><i class="fab fa-telegram-plane"></i></a>
                        <a href="#" class="spi-social-btn" title="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                {{-- CONTACT US --}}
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <h4 class="spi-footer-title">Contact Us</h4>
                    <ul class="spi-footer-list">
                        <li><i class="far fa-envelope"></i> info@spi.edu.kh</li>
                        <li><i class="fas fa-phone-alt"></i> +855 78 556 552, +855 96 53 86 889</li>
                        <li><i class="fas fa-map-marker-alt"></i> #3, Angkorki, Tapem, Tramkok, Takeo</li>
                    </ul>
                </div>

                {{-- DOWNLOAD --}}
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <h4 class="spi-footer-title">Download</h4>
                    <ul class="spi-footer-links">
                        <li><a href="#"><i class="fas fa-angle-right"></i> Enrollment Form</a></li>
                        <li><a href="#"><i class="fas fa-angle-right"></i> Request Form</a></li>
                        <li><a href="#"><i class="fas fa-angle-right"></i> Thesis Guideline</a></li>
                        <li><a href="#"><i class="fas fa-angle-right"></i> Permission Request</a></li>
                        <li><a href="#"><i class="fas fa-angle-right"></i> Examination Request Form</a></li>
                        <li><a href="#"><i class="fas fa-angle-right"></i> Student Hand Book</a></li>
                    </ul>
                </div>

                {{-- JUBILEE --}}
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <h4 class="spi-footer-title">Jubilee year 2025</h4>

                    <div class="spi-logos">
                        <img src="{{ asset('backend/dist/img/footer/photo_2025-01-30_08-23-26-1-1015x1024 (1).jpg') }}" alt="Jubilee Logo 1">
                        <img src="{{ asset('backend/dist/img/footer/photo_2025-01-30_08-23-26-1-1015x1024 (1).jpg') }}" alt="Jubilee Logo 2">
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- BOTTOM FOOTER --}}
    <div class="spi-footer-bottom">
        <div class="container-fluid">
            <div class="spi-footer-bottom-line"></div>
            <div class="spi-footer-bottom-text text-center">
                <div>All Rights Reserved, Copyright © 2024 Saint Paul Institute (SPI)</div>
                <div class="spi-footer-bottom-sub">
                    National Road 3, Angkorki Village, Tapem Commune, Tramkok District, Takeo Province, Cambodia.
                    Tel: +855 78 556 552, +855 96 53 86 889
                </div>
            </div>
        </div>
    </div>

</footer>

<style>
/* =========================
   ✅ FOOTER LIKE IMAGE
   Works with AdminLTE/Bootstrap
   ========================= */

.spi-footer{ width:100%; }

/* TOP */
.spi-footer-top{
    background:#08356a; /* dark blue */
    color:#fff;
    padding:70px 0 60px;
}
.spi-footer-row{ max-width:1400px; margin:0 auto; padding:0 10px; }

.spi-footer-title{
    font-weight:800;
    font-size:28px;
    margin:0 0 26px;
    position:relative;
    display:inline-block;
}
.spi-footer-title:after{
    content:"";
    position:absolute;
    left:0;
    bottom:-10px;
    width:120px;
    height:3px;
    background:#f5c000; /* yellow underline */
    border-radius:3px;
}

.spi-footer-text{
    opacity:.95;
    line-height:1.9;
    margin:0 0 26px;
    max-width:320px;
}

.spi-footer-list,
.spi-footer-links{
    list-style:none;
    padding:0;
    margin:0;
}
.spi-footer-list li{
    display:flex;
    gap:12px;
    align-items:flex-start;
    line-height:2.1;
    margin:0 0 10px;
    opacity:.95;
}
.spi-footer-list i{ margin-top:7px; opacity:.9; }

.spi-footer-links li{ margin:0 0 10px; }
.spi-footer-links a{
    color:#fff;
    text-decoration:none;
    font-weight:700;
    letter-spacing:2px;
    text-transform:uppercase;
    font-size:15px;
    display:inline-flex;
    align-items:center;
    gap:10px;
    opacity:.95;
    transition:transform .2s ease, opacity .2s ease;
}
.spi-footer-links a:hover{
    opacity:1;
    transform:translateX(4px);
    text-decoration:none;
}

/* SOCIAL */
.spi-social{ display:flex; gap:14px; }
.spi-social-btn{
    width:46px;
    height:46px;
    border-radius:50%;
    background:#fff;
    color:#0b2f55;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
    transition:transform .2s ease, opacity .2s ease;
}
.spi-social-btn:hover{ transform:translateY(-2px); opacity:.92; }

/* LOGOS */
.spi-logos{
    display:flex;
    gap:18px;
    margin-top:10px;
    flex-wrap:wrap;
}
.spi-logos img{
    width:120px;
    height:120px;
    object-fit:contain;
    background:#fff;
    padding:10px;
    border-radius:2px; /* looks like screenshot */
}

/* BOTTOM */
.spi-footer-bottom{
    background:#2a1a07; /* dark brown */
    color:#fff;
    padding:28px 0 24px;
}
.spi-footer-bottom-line{
    height:1px;
    background:rgba(255,255,255,.25);
    margin:0 0 18px;
}
.spi-footer-bottom-text{
    font-size:16px;
    font-weight:700;
}
.spi-footer-bottom-sub{
    font-weight:500;
    opacity:.95;
    margin-top:8px;
    font-size:16px;
    line-height:1.7;
}

/* Responsive */
@media (max-width: 768px){
    .spi-footer-title{ font-size:22px; }
    .spi-footer-title:after{ width:90px; }
    .spi-footer-top{ padding:50px 0 40px; }
    .spi-footer-links a{ letter-spacing:1px; font-size:14px; }
}
</style>
