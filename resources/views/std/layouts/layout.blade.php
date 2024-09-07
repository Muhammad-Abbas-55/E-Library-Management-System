
<!DOCTYPE html>
<html>
  <head>

    <!-- Meta -->
    <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">
      <title>@yield("title")</title>
      
        @include("std.layouts.styles")
  </head>


        @include("std.layouts.header")

        @include("std.layouts.left_sidebar")
    
        @yield("content")
 
        @include("std.layouts.footer")

        @include("std.layouts.scripts")

</body>
</html>
