 <h1>{{ $quote->name }}</h1>
 @foreach ($quote->pricedItems as $item)
   <div class="priced-item bg-[#F2F2F2] px-6 py-6 rounded-lg mb-4 ">
     <div class="grid grid-cols-[auto_50px]">
       <div class="flex flex-col">
         <div class="mb-2 font-semibold title"> {{ $item->title }}</div>
         <div class="content">
           {{ $item->content }}
         </div>
       </div>
       <div class="flex flex-col items-center gap-2 border-l border-gray-300 job">
         <div class="font-bold text-center uppercase abb" title="{{ $item->jobType->type }}">
           {{ $item->jobType->abbreviation }}
         </div>
         <div class="text-center hours">
           {{ $item->work_hours }}
         </div>
       </div>
     </div>
   </div>
 @endforeach
