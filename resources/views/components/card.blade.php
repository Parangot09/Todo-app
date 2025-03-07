   @props(['style' => '','shadow'=>''])
   
   <div class="card" style="{{$style}}">
       <div class="card-body {{$shadow}}">
          {{$slot}}
       </div>
   </div>
