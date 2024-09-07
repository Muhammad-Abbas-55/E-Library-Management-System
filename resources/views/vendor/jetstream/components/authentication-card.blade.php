<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
       <!--  {{ $logo }} --> 
       <div class="pull-left image">
          <img src="{!! asset('dist/img/uobs.jpg') !!}" style="border-radius: 100%; margin-top: -60px; margin-left: 95px;height: 150px ">
        </div>


      <h2 style="color: white; font-size: 18px; background-color: green; height: 42px; padding-top: 10px "> University Of Baltisan Librarian Login Panel </h2>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
