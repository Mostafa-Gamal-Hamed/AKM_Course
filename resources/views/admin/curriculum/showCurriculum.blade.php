

<style>
    ::-webkit-scrollbar{
        display: none;
    }
    body{
        margin: 0;
        padding: 20px;
        background-color: #0000007a;
    }
    .resume{
        position: relative;
        width: 100%; height: 100%;
    }
    .resume iframe{
        position: absolute;
        left: auto;
        top: auto;
        height: 100%;
        z-index: 5;
    }
</style>

<div class="resume">
    <iframe src="{{asset("storage/$level->book")}}" width="100%" height="400px"></iframe>
</div>