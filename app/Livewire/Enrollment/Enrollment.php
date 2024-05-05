<?php

namespace App\Livewire\Enrollment;

use App\Models\Courses;
use App\Models\Enrollments;
use App\Models\Payments;
use App\Models\Students;
use App\Models\User;
use Carbon\Carbon;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Enrollment extends Component
{
    use WithPagination;

    public $search;
    public $studentSearch;
    public $candidates = [];
    public $discount;
    public $courseInfo;
    public $installment;
    public $payment;
    public $installmentPermit;


    public function render()
    {
        return view('livewire.enrollment.enrollment');
    }

    #[Computed]
    public function courses()
    {
        return Courses::where('course_name', 'LIKE', "%{$this->search}%")->where('status', 'open')->get();
    }

    #[Computed]
    public function students()
    {
        return User::where('role', 'student')->where('name', 'LIKE', "%{$this->studentSearch}%")->paginate(6);
    }

    public function enrollStart($info)
    {
        $this->courseInfo = $info;
        $this->installmentPermit = false;
    }
    #[Computed]
    public function amount()
    {
        /**
         * Calculates the payment amount based on the course information, discount, and installment plan.
         *
         * This method checks the course information, discount, and installment plan to determine the appropriate payment amount.
         * If the course has a discount price, it calculates the discounted price and divides it by the number of installments.
         * If the course has a regular price, it calculates the discounted price and divides it by the number of installments.
         * If there is no installment plan, it returns the discounted price or regular price, with the discount applied if specified.
         * If the course information is not available, it returns 0.
         *
         * @return float The calculated payment amount.
         */
        if ($this->courseInfo) {
            if ($this->installment) {
                if ($this->courseInfo['discount_price']) {
                    if ($this->discount) {
                        return ($this->courseInfo['discount_price'] - ($this->courseInfo['discount_price'] * ($this->discount / 100))) / $this->installment;
                    } else {
                        return $this->courseInfo['discount_price'] / $this->installment;
                    }
                } else {
                    if ($this->discount) {
                        return ($this->courseInfo['price'] - ($this->courseInfo['price'] * ($this->discount / 100))) / $this->installment;
                    } else {
                        return $this->courseInfo['price'] / $this->installment;
                    }
                }
            } else {
                if ($this->courseInfo['discount_price']) {
                    if ($this->discount) {
                        return ($this->courseInfo['discount_price'] - ($this->courseInfo['discount_price'] * ($this->discount / 100)));
                    } else {
                        return $this->courseInfo['discount_price'];
                    }
                } else {
                    if ($this->discount) {
                        return ($this->courseInfo['price'] - ($this->courseInfo['price'] * ($this->discount / 100)));
                    } else {
                        return $this->courseInfo['price'];
                    }
                }
            }
        } else {
            return 0;
        }
    }

    public function enroll()
    {
        /**
         * Enrolls students in a course based on the provided candidates.
         *
         * This method iterates through the list of candidates and checks if they are already enrolled in the course.
         * If a candidate is not enrolled, it creates a new enrollment record and associated payment records (either full payment or installment).
         * The method keeps track of the number of successful and failed enrollments.
         *
         * If any enrollments fail, a warning message is displayed. If any enrollments succeed, a success message is displayed.
         * Finally, the method resets the form state.
         */
        $errorStudent = 0;
        $successStudent = 0;
        $enrollSuccess = false;
        $enrollError = false;
        foreach ($this->candidates as $key => $candidate) {
            if (!Enrollments::where('user_id', $candidate)->where('course_id', $this->courseInfo['id'])->exists()) {
                if ($this->installment) {
                    if ($this->courseInfo['discount_price']) {
                        if ($this->discount) {
                            $this->payment = ($this->courseInfo['discount_price'] - ($this->courseInfo['discount_price'] * ($this->discount / 100))) / $this->installment;
                        } else {
                            $this->payment = $this->courseInfo['discount_price'] / $this->installment;
                        }
                        for ($x = 1; $x <= $this->installment; $x++) {
                            Payments::insert([
                                'user_id' => $candidate,
                                'course_id' => $this->courseInfo['id'],
                                'payment_system' => 'installment',
                                'status' => 'unpaid',
                                'payment' => $this->payment,
                                'created_at' => Carbon::now(),
                            ]);
                        }
                        Enrollments::insert([
                            'user_id' => $candidate,
                            'course_id' => $this->courseInfo['id'],
                            'payment' => 'due',
                            'created_at' => Carbon::now(),
                        ]);

                        $successStudent++;
                        $enrollSuccess = true;
                    } else {
                        if ($this->discount) {
                            $this->payment = ($this->courseInfo['price'] - ($this->courseInfo['price'] * ($this->discount / 100))) / $this->installment;
                        } else {
                            $this->payment = $this->courseInfo['price'] / $this->installment;
                        }
                        for ($x = 1; $x <= $this->installment; $x++) {
                            Payments::insert([
                                'user_id' => $candidate,
                                'course_id' => $this->courseInfo['id'],
                                'payment_system' => 'installment',
                                'status' => 'unpaid',
                                'payment' => $this->payment,
                                'created_at' => Carbon::now(),
                            ]);
                        }
                        Enrollments::insert([
                            'user_id' => $candidate,
                            'course_id' => $this->courseInfo['id'],
                            'payment' => 'due',
                            'created_at' => Carbon::now(),
                        ]);

                        $successStudent++;
                        $enrollSuccess = true;
                    }
                } else {
                    if ($this->courseInfo['discount_price']) {
                        if ($this->discount) {
                            $this->payment = ($this->courseInfo['discount_price'] - ($this->courseInfo['discount_price'] * ($this->discount / 100)));
                        } else {
                            $this->payment = $this->courseInfo['discount_price'];
                        }
                        Payments::insert([
                            'user_id' => $candidate,
                            'course_id' => $this->courseInfo['id'],
                            'payment_system' => 'full-payment',
                            'status' => 'unpaid',
                            'payment' => $this->payment,
                            'created_at' => Carbon::now(),
                        ]);
                        Enrollments::insert([
                            'user_id' => $candidate,
                            'course_id' => $this->courseInfo['id'],
                            'payment' => 'due',
                            'created_at' => Carbon::now(),
                        ]);

                        $successStudent++;
                        $enrollSuccess = true;
                    } else {
                        if ($this->discount) {
                            $this->payment = ($this->courseInfo['price'] - ($this->courseInfo['price'] * ($this->discount / 100)));
                        } else {
                            $this->payment = $this->courseInfo['price'];
                        }
                        Payments::insert([
                            'user_id' => $candidate,
                            'course_id' => $this->courseInfo['id'],
                            'payment_system' => 'full-payment',
                            'status' => 'unpaid',
                            'payment' => $this->payment,
                            'created_at' => Carbon::now(),
                        ]);
                        Enrollments::insert([
                            'user_id' => $candidate,
                            'course_id' => $this->courseInfo['id'],
                            'payment' => 'due',
                            'created_at' => Carbon::now(),
                        ]);

                        $successStudent++;
                        $enrollSuccess = true;
                    }
                }
                $this->payment = 0;
            } else {
                $errorStudent++;
                $enrollError = true;
            }
        }

        if ($enrollError) {
            notyf()->addWarning($errorStudent . " " . "student already enrolled");
        }


        if ($enrollSuccess) {
            notyf()->addSuccess($successStudent . " " . "student enrolled successfully");
        }

        $this->reset();
    }
}
