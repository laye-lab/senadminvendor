<table class="table ">
    <thead>
      <tr>
        <th>#</th>
        <th>Mois</th>
        <th>Nom agent</th>
        <th>Matricule</th>
        <th>Taux à 15%</th>
        <th>Taux à 40%</th>
        <th>Taux à 60%</th>
        <th>Taux à 100%</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($data as  $datass)
              @if($datass->month == $datas->month)


             <tr>
                      <td>{{$datass->year}}</td>
                      <td>{{$datass->month}}</td>
                      <td>{{$datass->Nom}}</td>
                      <td>{{$datass->agent}}</td>
                      <td>{{$datass->sum15}}</td>
                      <td>{{$datass->sum40}}</td>
                      <td>{{$datass->sum60}}</td>
                      <td>{{$datass->sum100}}</td>
                      <td><button class=" btn btn-lg btn-danger">{{$datass->total}}</button></td>
             </tr>
             @endif
       @endforeach

    </tbody>

  </table>

