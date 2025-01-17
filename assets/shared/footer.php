<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<footer id="footer" class="container-fluid align-items-center text-center py-3">
    <div class="row">
        <div class="col-12 col-md-6 order-2 order-md-1">
            <p class="bold">Contact us: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>
                    <a href="tel:+639668740452">
                        +639668740452
                    </a>
                    ,&nbsp;
                    <a href="mailto:stbjobs@gmail.com">
                        stbjobs@gmail.com
                    </a>
                </span>
            </p>
        </div>
        <div class="col-12 col-md-6 order-1 order-md-2">
            <p class="bold clickable" onclick="window.location.href='../user/about.php'">
                About us
            </p>
        </div>
        <div class="col-12 copyright order-3">
            <p>&copy; 2025 STB Jobs. All rights reserved.</p>
        </div>
    </div>
</footer>



<style>
    /*For removing the default link style*/
    a {
        text-decoration: none;
        color: inherit
    }

    a:focus,
    a:active {
        outline: none
    }

    /*Footer part*/
    #footer {
        background: #43B272;
        padding: 10px 15px;
        height: auto;
        margin-bottom: 0;
        justify-content: center;
        align-items: center;
    }

    .row {
        margin: 0;
        padding: 0;
    }

    .copyright {
        padding-top: clamp(10px, 1vw, 20px);
        text-align: center;
        font-family: Poppins;
        font-size: clamp(11px, 2vw, 18px);
        font-weight: 500;
        color: #FFFFFF;
    }

    .bold {
        text-align: center;
        font-family: Poppins;
        font-size: clamp(13px, 2vw, 18px);
        font-weight: bolder;
        color: #FFFFFF;
    }

    .clickable {
        cursor: pointer;
    }

    .clickable:hover {
        opacity: 50%;
    }

    .clickable:active {
        color:rgb(150, 135, 135);
    }
</style>