<?php

namespace App\Livewire\Pages\Course\Course;

use App\Models\Courses;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class CourseList extends Component
{

    #[On('reloading')]
    public function recheck(){
        unset($this->courses);
    }

    #[Computed]
    public function courses(){
        return Courses::all();
    }

    public function delete($id){
        $courseInfo = Courses::where('id',$id)->first();
        if ($courseInfo->course_image) {
            unlink('uploads/course_photos/'.$courseInfo->course_image);
        }
        Courses::where('id',$id)->delete();
        notyf()->addSuccess('Course has been deleted.');
    }
    public function render()
    {
        return view('livewire.pages.course.course.course-list');
    }
}
