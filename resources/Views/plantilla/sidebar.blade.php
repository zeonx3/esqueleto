
<nav class="sidebar-nav">
@foreach (per_padresv2() as $pa ) 

    <ul id="sidebarnav">
        @if($pa->id == 1)
            <?php $id_empresa = count(EmpresasUser(Auth::user()->id)) > 1 ? 9 : EmpresasUser(Auth::user()->id)[0]['id'];  ?>
                <li class="sidebar-item"><a href="{{ URL::to("empresas/".$id_empresa) }}" class="sidebar-link"> <i class="{{$pa->per_icon}}"></i><span class="hide-menu">{{ __($pa->per_nombre) }}</span></a>
                </li>
        @elseif($pa->id == 18 && count(EmpresasUser(Auth::user()->id)) <= 1)
        @else
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ URL::to($pa->per_accion) }}" aria-expanded="false"><i class="{{$pa->per_icon}}"></i><span class="hide-menu">{{__($pa->per_nombre)}}</span></a>
                    
                    <?php $permisos = per_hijos($pa->id)?>

                    <ul aria-expanded="false" class="collapse first-level">
                    @foreach ($permisos as $ph)
                            
                            <li class="sidebar-item"><a href="{{ URL::to($ph->per_accion) }}" class="sidebar-link"><i class="{{$ph->per_icon}}"></i><span class="hide-menu">{{ __($ph->per_nombre) }}</span></a>
                            </li>
                    @endforeach
                    </ul>
                </li>
        @endif
    </ul>

@endforeach
</nav>