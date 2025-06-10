 @extends('layout')

 @section("heading")

 <?php $heading = "All Contacts";
    echo $heading; ?>
 @endsection


 @section("glavnastranica")

 <div class="flex justify-end">
     <div class="text-2xl text-blue-800 font-black rounded-full flex items-center justify-center mb-8 p-2">
         <a href="/contact">Unesite novi kontakt +</a>
     </div>
 </div>




 <table class="table-auto" style="border: 1px solid black; width: 1200px; align-content:center">
     <thead>
         <tr>
             <th>Name</th>
             <th>Email</th>
             <th>Password</th>
             <th>ID</th>
             <th>Action</th>

         </tr>
     </thead>
     <tbody>

         @foreach ($allcontacts as $singleContact )


         <tr>
             <td style="border: 1px solid black">{{ $singleContact->name }}</td>
             <td style="border: 1px solid black">{{ $singleContact->email }}</td>
             <td style="border: 1px solid black">{{ $singleContact->password }}</td>
             <td style="border: 1px solid black">{{ $singleContact->id }}</td>
             <td style="border: 1px solid black">
                 <a style="color:red; font-weight: 700;" href=" /admin/delete-contact/{{ $singleContact->id }}">Delete</a>
                 <a style="color:blue; font-weight: 700;" href="#">Edit</a>
             </td>
         </tr>
         @endforeach
     </tbody>
 </table>

 @endsection