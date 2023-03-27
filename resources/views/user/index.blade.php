@extends('adminlte::page')
@section('title', 'Halaman User')

@section('content_header')
    <h1 class="m-0 text-dark">User</h1>
@stop
@section('link')
<li class="breadcrumb-item active">User</li>
@stop

@section('content')
<div class="card">
   <div class="card-body">
       @if (session('status'))
           <x-adminlte-alert theme="success" title="Sukses">
               {{session('status')}}
           </x-adminlte-alert>
       @endif
       @if ($errors->any())
           <x-adminlte-alert theme="success" title="Sukses">
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </x-adminlte-alert>
       @endif
       <a href="{{route('user.create')}}" class="btn btn-md btn-success mx-1 shadow"> <i class="fa fa-lg fa-fw fa-plus"></i> Tambah User </a>
       <br/> <br/>
       <div class="table-responsive">
           <table id="tabel_user" class="table table-striped table-hover table-condensed table-bordered">
               <thead>
               <tr style="background-color: darkgrey">
                       <th>No</th>
                       <th>Username</th>
                       <th>Nama</th>
                       <th>Email</th>
                       <th>NIK</th>
                       <th>No Telepon</th>
                       <th>Level</th>
                       <th class="text-center" width="70">Aksi</th>
                   </tr>
               </thead>
               <tbody>
               @foreach($user as $user)
                   <tr>
                       <td>{{$loop->iteration}}</td>
                       <td>{{$user->username}}</td>
                       <td>{{$user->name}}</td>
                       <td>{{$user->email}}</td>
                       <td>{{$user->nik}}</td>
                       <td>{{$user->nomortelp}}</td>
                       <td>{{$user->level}}</td>
                           <td>
                               <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-primary"
                                   title="Edit"><i class="far fa-edit"></i>Edit</a>
                                   <x-adminlte-button class="btn btn-sn btn-danger" label="Delete" data-toggle="modal" data-target="#hapususer{{$loop->iteration}}" icon="far fa-trash-alt" class="bg-danger"> Hapus </x-adminlte-button>
                                       {{-- Custom --}}
                                   <x-adminlte-modal id="hapususer{{$loop->iteration}}" title="Hapus User" size="md" theme="orange"
                                   icon="fas fa-bell" v-centered static-backdrop scrollable>
                                   <div style="height:80px;">
                                       <form action="{{route('user.delete',$user->id)}}" method="POST">
                                           @csrf
                                           @method('DELETE')
                                             Apakah anda yakin akan menghapus user ini?</div>
                                   <x-slot name="footerSlot">
                                       <x-adminlte-button type="submit" class="mr-auto" theme="primary" label="Hapus"/>
                                       <x-adminlte-button theme="danger" label="Batal" data-dismiss="modal"/>
                                       </form>
                                   </x-slot>
                                   </x-adminlte-modal>
                           </td>
                


                         </tr>
                       @endforeach
               </tbody>
           </table>
       </div>
   </div>
</div>
@stop
@section('plugins.Datables', true)
@section('js')
<script> $('#tabel_user').DataTable();</script>
@stop