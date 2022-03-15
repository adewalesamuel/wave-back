<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Report | {{env('APP_NAME')}}</title>
</head>
<body>
    <table style="border-spacing: 0; border-top: 0px solid black; border-right: 1px solid black" width="100%">
        <thead style="font-weight: bolder">
            <tr>
                <td colspan="2"></td>
                @for ($i = intval($start_year); $i <= intval($end_year); $i++)
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black" colspan="4">
                        {{$i}}
                    </td>
                @endfor
                <td colspan="5"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                @for ($i = intval($start_year); $i <= intval($end_year); $i++)
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black">Q1</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black">Q2</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black">Q3</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black">
                        Q4
                    </td>
                @endfor
            </tr>
            <tr>
                <td style="border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black;">N°</td>
                <td style="border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black;">ACTIVITIES</td>
                @for ($i = intval($start_year); $i <= intval($end_year); $i++)
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black"></td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black"></td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black"></td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black"></td>
                    @endfor
                <td style="border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black">Note</td>
                <td style="border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black">Target</td>
                <td style="border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black">Actual achieved</td>
                <td style="border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black">Deadline for completion of activity</td>
                <td style="border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black">Budget</td>
                <td style="border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black">Actual spent</td>
            </tr>
        </thead>
        <tbody>
            @php
                $num = 0;
            @endphp
            @for($i=1; $i <= count($activities); $i++)
                @php
                    $num += 1;
                @endphp
                @if ($activities[$i - 1]->outcome_id)
                    <tr>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; color: lime; font-weight: bolder" colspan="100">
                            {{$activities[$i -1]->outcome->name ?? ""}}
                        </td>
                    </tr>
                @endif
                <tr>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$num ?? ""}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]->name ?? ""}}</td>

                    @for ($k = intval($start_year); $k <= intval($end_year); $k++)
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; color: lime; text-align:center; font-size:16px">
                            @if ($activities[$i - 1]->periods)
                                @foreach (json_decode($activities[$i - 1]->periods) as $period)
                                    @if (intval($period->date) == $k &&  in_array('q1', $period->quarters))
                                        <span>&times;</span>
                                    @endif
                                @endforeach
                            @endif
                        </td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; color: lime; text-align:center; font-size:16px">
                            @if ($activities[$i - 1]->periods)
                                @foreach (json_decode($activities[$i - 1]->periods) as $period)
                                    @if (intval($period->date) == $k &&  in_array('q2', $period->quarters))
                                        <span>&times;</span>
                                    @endif
                                @endforeach
                            @endif
                        </td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; color: lime; text-align:center; font-size:16px">
                            @if ($activities[$i - 1]->periods)
                                @foreach (json_decode($activities[$i - 1]->periods) as $period)
                                    @if (intval($period->date) == $k &&  in_array('q3', $period->quarters))
                                        <span>&times;</span>
                                    @endif
                                @endforeach
                            @endif
                        </td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; color: lime; text-align:center; font-size:16px">
                            @if ($activities[$i - 1]->periods)
                                @foreach (json_decode($activities[$i - 1]->periods) as $period)
                                    @if (intval($period->date) == $k &&  in_array('q4', $period->quarters))
                                        <span>&times;</span>
                                    @endif
                                @endforeach
                            @endif
                        </td>
                    @endfor

                    <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]->description ?? ""}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black">
                        {{$activities[$i - 1]->indicator->target ?? ""}} {{$activities[$i - 1]->indicator->unit ?? ""}}
                    </td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]->indicator->achieved ?? ""}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]->end_date ?? ""}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]->budget ?? ""}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]->amount_spent ?? ""}}</td>
                </tr>
                @if ($activities[$i - 1]['children'] && count($activities[$i - 1]['children']) > 0 )
                    @for ($j = 0; $j < count($activities[$i - 1]['children']); $j++)
                        @php
                            $num += 1;
                        @endphp
                    <tr>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$num ?? ""}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]['children'][$j]->name ?? ""}}</td>
                        @for ($k = intval($start_year); $k <= intval($end_year); $k++)
                            <td style="border-bottom: 1px solid black; border-left: 1px solid black"></td>
                            <td style="border-bottom: 1px solid black; border-left: 1px solid black"></td>
                            <td style="border-bottom: 1px solid black; border-left: 1px solid black"></td>
                            <td style="border-bottom: 1px solid black; border-left: 1px solid black"></td>
                        @endfor
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]['children'][$j]->description ?? ""}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black">
                            {{$activities[$i - 1]['children'][$j]->indicator->target ?? ""}} {{$activities[$i - 1]['children'][$j]->indicator->unit ?? ""}}
                        </td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]['children'][$j]->indicator->achieved ?? ""}}</td>                        <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]['children'][$j]->end_date ?? ""}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]['children'][$j]->budget ?? ""}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]['children'][$j]->amount_spent ?? ""}}</td>
                    </tr>
                    @endfor
                    
                @endif
            @endfor
        </tbody>
    </table>
    
</body>
</html>