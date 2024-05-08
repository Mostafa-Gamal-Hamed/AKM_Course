@extends('user.layout')

@section('Title')
    Lorem Blog
@endsection

<style>
    /* Header */
    .header{
        margin-top: 100px;
        padding: 20px
    }

    /* blog */
    .header .blogBody{
        max-width: 90%;
        margin: auto;
    }
    .header .blogBody img{
        max-width: 90%;
        margin-bottom: 25px;
        border-radius: 15px;
    }
</style>

@section("Body")
    {{-- Header --}}
    <div class="header">
        <div class="contanier bg-light p-5 shadow">
            <div class="mb-5">
                <h4 class="fw-bold">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti, odio.</h4>
                <span>12/03/2024</span>
            </div>
            <div class="blogBody text-center">
                <img src="{{asset('images/blog1.png')}}" alt="Blog Image">
                <p class="text-dark">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur vitae perferendis, quia sint eligendi veritatis amet dolorem iusto voluptatum nam,
                    molestias consequatur cupiditate, numquam facere ipsum dolores? Similique, dolor aut?
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde suscipit cupiditate sed amet illo officiis atque quod eligendi ut optio eos asperiores
                    porro quos nobis fugit, consequatur aliquid temporibus esse nisi. Incidunt, harum sequi voluptates eaque, alias ea, facere culpa optio illum mollitia aspernatur quas hic adipisci. Architecto, quas illum!
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus alias obcaecati suscipit molestiae! Nesciunt cupiditate sed quos temporibus laboriosam quae quis expedita dignissimos corporis eveniet
                    impedit voluptate consequuntur inventore, perspiciatis fuga reprehenderit autem, possimus aut laudantium minus itaque ullam? Libero nesciunt provident deserunt ipsam expedita necessitatibus explicabo? Nobis, culpa excepturi tempora totam suscipit ex ipsam laudantium. Aperiam consectetur ex ut exercitationem? Adipisci similique minima dolore est nemo quasi possimus et voluptas blanditiis nesciunt necessitatibus, rerum ea autem iste, eveniet consectetur, explicabo numquam error vero. Hic assumenda cumque fugiat, non iusto cum laboriosam ea. Maiores illum quidem quas sint corrupti dignissimos!
                </p>
            </div>
        </div>
    </div>

@endsection