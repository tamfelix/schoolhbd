<table class="w-[190px] h-[300px] pl-5  mx-3 mt-0  items-center" >
    <tbody class="font4 pl-6 uppercase text-gray-600">
    @foreach($timetable as $time => $number)
        <tr class="font4   py-2 border-b ">
            <td class = "w-[30%] px-1">{{$number}} {{ __('sections.lesson') }}</td>
            <td class = "w-[35%] font4">{{$time}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
