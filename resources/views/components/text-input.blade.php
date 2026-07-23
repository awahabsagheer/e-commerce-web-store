@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full bg-white/60 border border-slate-300/60 rounded-xl px-4 py-3 text-sm text-slate-800 placeholder-slate-400 focus:border-[#059669] focus:ring-1 focus:ring-[#059669] font-mono transition']) !!}>