<style>
    /* Carousel base class */
    .carousel {
        height: 300px;
        margin-bottom: 10px;
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
            height: 200px;
            margin-bottom: 10px;
        }
        /* Since positioning the image, we need to help out the caption */
        .carousel-caption {
            z-index: 10;
        }

        /* Declare heights because of positioning of img element */
        .carousel .item {
            height: 200px;
            background-color: #777;
        }
        .carousel-inner > .item > img {
            position: absolute;
            top: 0;
            left: 0;
            min-width: 100%;
            height: 200px;
        }
        .slide-img {
            height:200px !important;
            object-fit: cover !important;
        }
    }
</style>
