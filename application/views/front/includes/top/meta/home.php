<style>
    /* Carousel base class */
    .carousel {
        height: 300px;
        margin-bottom: 10px;
        min-width: 100%;
    }
    /* Since positioning the image, we need to help out the caption */
    .carousel-caption {
        z-index: 10;
    }
    /* Declare heights because of positioning of img element */
    .carousel .item {
        height: 300px;
        background-color: #777;
    }

    .carousel .carousel-indicators {
        margin-bottom: -3px !important;
        bottom: 0px;
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

