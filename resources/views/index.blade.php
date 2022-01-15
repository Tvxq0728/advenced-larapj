@extends("layouts.default")
<style>
  th {
      background-color: #289ADC;
      color: white;
      padding: 5px 40px;
    }
    tr:nth-child(odd) td{
      background-color: #FFFFFF;
    }
    td {
      padding: 25px 40px;
      background-color: #EEEEEE;
      text-align: center;
    }
    svg.w-5.h-5 {  /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
    }
</style>
@section('title', 'index.blade.php')

@section('content')
{{--<table>
  <tr>
    <th>id</th>
    <th>name</th>
    <th>age</th>
    <th>nationality</th>
  </tr>
  @foreach ($items as $item)
  <tr>
    <td>
      {{$item->id}}
    </td>
    <td>
      {{$item->name}}
    </td>
    <td>
      {{$item->age}}
    </td>
    <td>
      {{$item->nationality}}
    </td>
  </tr>
  @endforeach
</table>--}}
<table>
  <tr>
    <th>Data</th>
  </tr>
  @foreach($items as $item)
  <tr>
    <td>
      {{$item->getDetail()}}
    </td>
  </tr>
  @endforeach
</table>
{{$items->links()}}
@endsection