<div>
    <!-- Order your soul. Reduce your wants. - Augustine -->
    <ul class="footer-social">
       @if ($links->twetter!==null)
        <li><a href="{{$links->twetter}}" class="twitter"><i class="fa fa-twitter"></i></a></li>
       @endif
     @if ($links->instegram!==null)
         <li><a href="{{$links->instegram}}" class="instagram"><i class="fa fa-instagram"></i></a></li>
     @endif
        @if ($links->youtube!==null)
             <li><a href="{{$links->youtube}}" class="youtube"><i class="fa fa-youtube"></i></a></li>
        @endif
       @if ($links->linkedin!==null)
       <li><a href="{{$links->linkedin}}" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
       @endif   
    </ul>
</div>