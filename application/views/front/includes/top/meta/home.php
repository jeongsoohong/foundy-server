<style>
    /* Carousel base class */
    .carousel {
        height: 500px;
        margin-bottom: 10px;
        min-width: 100%;
    }
    /* Since positioning the image, we need to help out the caption */
    .carousel-caption {
        z-index: 10;
    }
    /* Declare heights because of positioning of img element */
    .carousel .item {
        height: 500px;
        background-color: #777;
    }

    .carousel .carousel-indicators {
        margin-bottom: 20px !important;
        bottom: 0px;
    }
    .carousel-inner > .item > img {
        position: absolute;
        top: 0;
        left: 0;
        min-width: 100%;
        height: 500px;
    }

    .slide-img {
        height: 500px !important;
        object-fit: cover !important;
    }

    .carousel-inner .item a img.slide-img {
        object-fit: cover !important;
        min-width: 100%;
    }
    .carousel-inner .item div .carousel-caption h1 {
        color: #FFFFFF;
        font-family: 'Futura' !important;
    }
    /*
        .carousel-inner .item div .carousel-caption {
            padding-top: 50px !important;
        }
    */
    .carousel-inner .item div .carousel-caption p a.btn-primary {
        color: #FFFFFF !important;
        background-color: black !important;
        border: none !important;
        font-size: 12px !important;
        width: 110px !important;
        height: 40px !important;
        text-align: center;
        padding: 10px 5px 10px 5px !important;
    }

    @media (max-width: 768px) {
        /* Carousel base class */
        .carousel {
            height: 300px;
        }
        /* Declare heights because of positioning of img element */
        .carousel .item {
            height: 300px;
        }
        .carousel-inner > .item > img {
            position: absolute;
            top: 0;
            left: 0;
            min-width: 100%;
            height: 300px;
        }
        .slide-img {
            height:300px !important;
            object-fit: cover !important;
        }
    }
</style>

<style>

    /* content-area layout */
    @media (max-width: 992px) {
        .content-area .page-section .container {
            padding: 0px !important;
            margin: 0px !important;
            width: auto !important;
        }
    }

</style>

