@extends('layouts.app')

@section('content')

    <body>



        <main class="container mx-auto md:w-3/5 mt-3">



            <div class="mission text-center justify-items-center">
                <span class="text-2xl border-b-2 border-orange-500 font-bold">MISSION</span>

                <p class="p-3 font-bold italic text-cyan-700 tracking-wide leading-6">Sa Sangguniang Kabataan of Barangay
                    Nagkaisang Nayon
                    envisions a
                    progressive
                    youth
                    community that is
                    engaged, involved, and empowerd who will contribute meaningfully in the community.</p>

            </div>

            <div class="vision text-center ">
                <span class="text-2xl border-b-2 border-orange-500 font-bold">VISION</span>
                <p class="p-3 font-bold italic text-cyan-700 tracking-wide leading-6">The Sangguniang Kabataan of Barangay
                    Nagkaisang Nayon aims to provide sustainable programs and activities
                    for the 9 centers of youth participation
                    that will equip the youth the right values, skills, and knowledge for a collective and active
                    involvement in
                    the community.</p>

            </div>

            <div class="accomplishments my-2 ">
                <div class="grid grid-cols-2">
                    <div>
                        <iframe
                            src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FSKNagkaisangNayon%2Fposts%2Fpfbid02q7viciPyUerBTx1wixxduJYvNyAWjBok3YyN6WSbf1cWL43eLh5AwkuYi6kU4H8Xl&show_text=true&width=500"
                            width="500" height="710" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                            allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>

                    <div>
                        <iframe
                            src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FSKNagkaisangNayon%2Fposts%2Fpfbid02DPzZUwCrHqR4uiBRdDQ7ueL9tyJ7knwpRC4Cbcw8agyuG6fKj5cr2k4aDjWRf1oVl&show_text=true&width=500"
                            width="500" height="723" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                            allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>

                </div>

            </div>

        </main>
        <footer class="   bottom-0 text-center left-0 bg-cyan-700 w-full h-36 text-white shadow-md">
            <p class="p-3 font-semibold">Banahaw Street, Amparo Subdivision, Barangay Nagkaisang Nayon Novaliches Quezon
                City
            </p>
            <span class="leading-6"><i class="fa-solid fa-phone"></i> 09666697166</span><br>
            <span class="leading-6"><i class="fa-solid fa-envelope"></i> sknagkaisangnayon@gmail.com</span><br><br>
            <span class="leading-6"> <a class=" hover:underline" href="https://www.facebook.com/SKNagkaisangNayon"><i
                        class="fa-brands fa-facebook fa-2xl"></i></a></span>
        </footer>
    </body>
    <script>
        $(document).ready(function() {
            $('.about_us-nav').removeClass('text-gray-700');
            $('.about_us-nav').addClass('text-blue-500');
        });
    </script>
@endsection
