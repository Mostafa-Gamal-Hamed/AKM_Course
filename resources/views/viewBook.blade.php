<style>
    body{
        background-color: black;
        padding: 5px;
    }
    iframe{
        height: 100%;
        width: 100%;
    }
</style>

<iframe src="{{asset("storage/{$book->book}")}}" frameborder="0"></iframe>