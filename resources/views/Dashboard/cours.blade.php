@extends('Dashboard.index')
@section('navsidebar')

<div class="container mt-4">
    <h2 style="display:inline">Liste des cours</h2>
	<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addCourseModal" style="float: right;">
                <i class="fas fa-plus "></i> Ajouter un cours
    </button>
    <table class="table mt-5" style="width: 60%; margin: auto;">
        <thead>
            <tr>
                <th>Nom du cours</th>
                <th>Actions </th>
				

            </tr>
        </thead>
        <!--tbody>
            <tr>
                <td>Course 1</td>
                <td>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updateCourseModal">
                        <i class="fas fa-edit"></i> Update
                    </button>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteCourseModal">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </td>
            </tr>
            <tr>
                <td>Course 2</td>
                <td>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updateCourseModal">
                        <i class="fas fa-edit"></i> Update
                    </button>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteCourseModal">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </td>
            </tr>
            
        </tbody-->
    </table>
</div>

<!-- Add Course Modal -->
<div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="addCourseModalLabel" aria-hidden="true">
    <!-- Add your modal content here for adding a course -->
</div>

<!-- Update Course Modal -->
<div class="modal fade" id="updateCourseModal" tabindex="-1" role="dialog" aria-labelledby="updateCourseModalLabel" aria-hidden="true">
    <!-- Add your modal content here for updating a course -->
</div>

<!-- Delete Course Modal -->
<div class="modal fade" id="deleteCourseModal" tabindex="-1" role="dialog" aria-labelledby="deleteCourseModalLabel" aria-hidden="true">
    <!-- Add your modal content here for deleting a course -->
</div>
@endsection()