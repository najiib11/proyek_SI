@extends("home")

@section("view")
    <div class="start-row-2 col-span-full py-20  flex mobile:flex-col md:flex-row justify-center gap-10">
        <div id="layout1" class="bg-slate-100 px-10 text-md flex flex-col justify-center items-center rounded-lg">
            <div id="deskripsi" class="font-bold before:content-[''] px-20 ">Selamat datang</div>
        </div>
        <div id="layout2" class="bg-slate-100 p-10 flex flex-col justify-center items-start rounded-lg ">
            <div id="sub-layout1" class="flex justify-center items-center gap-20 pb-5 ">   
                <div id="deskripsi" class="text-md font-bold ">Pendaftaran</div>
                @if(!Auth::guard('pendaftaran')->check())
                    <div id="status" class="text-sm before:content-['('] after:content-[')']">Belum mendaftar</div>
                    <div id="btn" class="text-lg text-white font-bold bg-lime-400 rounded-md hover:bg-lime-600 px-5 py-2">
                        <a href="{{route('view.pendaftaran')}}">Daftar</a> 
                    </div>
                @endif
                @if(Auth::guard('pendaftaran')->check())
                    <div id="status" class="text-sm before:content-['('] after:content-[')']">Sudah mendaftar</div>
                    <div id="btn" class="text-lg text-white font-bold bg-lime-400 rounded-md hover:bg-lime-600 px-5 py-2 transition-x-[80px]">
                        <a href="{{route('cabut.data')}}">Batalkan</a> 
                    </div>
                @endif
                
            </div>
            <div id="sub-layout2" class="flex justify-center items-center gap-10">
                <div id="deskripsi" class="text-md font-bold ">Kartu sehat balita</div>
                @if(!Auth::guard('ksb')->check())
                    <div id="status" class="text-sm before:content-['('] after:content-[')'] pr-[54px]">Belum tersedia</div>
                @endif
                @if(Auth::guard('ksb')->check())
                    <div id="status" class="text-sm before:content-['('] after:content-[')'] pr-[54px]">Sudah tersedia</div>
                    <div id="btn" class="text-lg text-white font-bold bg-lime-400 rounded-md hover:bg-lime-600 px-[36px] py-2">
                        <a href="{{route('view.pendaftaran')}}">Lihat</a> 
                    </div>
                @endif
                
                
            </div>
        </div>
    </div>

    
@endsection