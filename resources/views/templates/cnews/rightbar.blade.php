      <div class="right">
        <h2>Danh mục</h2>
        <ul>
        		@foreach ($objCats as $items)
        			@php
                        $arr = [
                            'name' => str_slug($items->name),
                            'id'   => $items->cid,
                        ]
                    @endphp
        			<li><a href="{{ route('cnews.news.cat',$arr) }}">{{ $items->name }}</a></li>
        		@endforeach
        	
          
        </ul>
      </div>