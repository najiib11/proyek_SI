@extends("home")

@section("view")
    <div class="row-start-2 col-span-full px-[500px] ">
        <div class="flex flex-col justify-center items-center bg-slate-100 py-16 rounded-lg">
            <div class="font-bold text-lg py-5">Pendaftaran</div>
            <form action="{{ route('proses.pendaftaran') }}" method="POST">
                @csrf
                <div class="flex flex-col items-start justify-center px-16 gap-7">
                    <label for="name">Nama Lengkap<br><input type="text" name="name" class="px-10"></label>
                    @error("name")
                        <span class="text-sm  bg-red-400 px-[53px] py-4">{{ $message }}</span>
                    @enderror
                    <label for="gender">Jenis Kelamin <br><select name="gender" id="gender" class="px-20">
                        <option value="pria" class="text-start">Laki-laki</option>
                        <option value="perempuan" class="">Perempuan</option>
                    </select></label>
                    <label for="alamat">Alamat <br><input type="text" name="alamat" class="px-10"></label>
                    @error("alamat")
                        <span class="text-sm  bg-red-400 px-[53px] py-4">{{ $message }}</span>
                    @enderror
                    <div class="text-md text-white font-bold bg-lime-400 hover:bg-lime-500 px-[106px] py-3 rounded-lg text-center">
                        <input type="submit" name="submit" value="Daftar">
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
@endsection