<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class CoursesReviews extends Component
{

    public $course_id, $rating = 5, $comment;

    public function mount(Course $course){
        $this->course_id = $course->id;
    }

    public function render()
    {

        $course = Course::find($this->course_id);

        return view('livewire.courses-reviews', compact('course'));
    }

    public function store(){

        $rules = [
            'comment' => 'required'
        ];

        $this->validate($rules);

        $course = Course::find($this->course_id);

        $course->reviews()->create([
            'comment' => $this->comment,
            'rating' => $this->rating,
            'user_id' => auth()->user()->id
        ]);
    }
}
