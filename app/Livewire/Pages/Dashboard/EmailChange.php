<?php

namespace App\Livewire\Pages\Dashboard;

use App\Mail\OTP_verification;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;
use App\Models\User;
use Livewire\Attributes\On;
use App\Models\Verifications;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailChange extends Component
{
    public $email;

    public $confirmOtp;

    public $changeMail;

    public $OTP = '';


    public $mailSent = false;

    public function mount()
    {
        $otpExists = Verifications::where('user_id', auth()->user()->id)->first();
        if ($otpExists) {
            $this->mailSent = true;
        }
    }
    public function changeEmail()
    {
        $this->changeMail = $this->email;
        $this->OTP = Str::random(4);
        $otpExists = Verifications::where('user_id', auth()->user()->id)->first();
        if ($otpExists) {
            Verifications::where('user_id', auth()->user()->id)->delete();
        }
        Verifications::insert([
            'otp' => $this->OTP,
            'user_id' => auth()->user()->id,
            'user_email' => auth()->user()->email,
            'created_at' => Carbon::now(),
        ]);
        Mail::to(auth()->user()->email)->send(new OTP_verification($this->OTP));
        notyf()->addInfo('OTP sent to your email' . auth()->user()->email);
        $this->mailSent = true;
        $this->reset($this->email);
    }


    public function confirmOTP()
    {
        // $this->validate();
        $otpExists = Verifications::where('user_id', auth()->user()->id)->first();
        if ($otpExists->otp == $this->confirmOtp) {
            User::where('id', auth()->user()->id)->update([
                // 'email' => 'a@b.com',
                'email' => $this->changeMail,
            ]);
            Verifications::where('user_id', auth()->user()->id)->delete();
            notyf()->addSuccess('User email has been changed.');
            $this->confirmOtp="";
            $this->email="";
            $this->mailSent = false;
            $this->dispatch('reloading');
        }
    }

    #[On('reloading')]
    public function render()
    {
        return view('livewire.pages.dashboard.email-change');
    }
}
