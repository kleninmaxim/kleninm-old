<x-default-layout>
    <main class="flex-1 flex flex-col">
        <div class="max-w-2xl w-full py-12 px-4 mx-auto">
            <div class="mb-5 text-gray-500 text-xs">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                     class="inline-block w-4 h-4 text-gray-400 dark:fill-gray-600">
                    <path d="M5.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H6a.75.75 0 01-.75-.75V12zM6 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H6zM7.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H8a.75.75 0 01-.75-.75V12zM8 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H8zM9.25 10a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H10a.75.75 0 01-.75-.75V10zM10 11.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V12a.75.75 0 00-.75-.75H10zM9.25 14a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H10a.75.75 0 01-.75-.75V14zM12 9.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V10a.75.75 0 00-.75-.75H12zM11.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H12a.75.75 0 01-.75-.75V12zM12 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H12zM13.25 10a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H14a.75.75 0 01-.75-.75V10zM14 11.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V12a.75.75 0 00-.75-.75H14z"></path>
                    <path fill-rule="evenodd"
                          d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"
                          clip-rule="evenodd"></path>
                </svg>
                April, 2021
            </div>
            <div class="prose prose-zinc dark:prose-invert max-w-none">
                {!! \Illuminate\Support\Str::markdown($test->body) !!}
                <h1>JSON API Error Responses in Laravel with Httpable Exceptions</h1>
                <div class="p-4 rounded-md bg-red-500/10 text-red-800 dark:text-white">
                    Just a heads-up this article is over 12 months old and <em>might</em> be out of date!
                </div>
                <p>Today I'd like to talk about a pattern I've been enjoying&nbsp;lately.</p>
                <p>One of my favourite pairs of helpers in Laravel is <code>abort_if()</code> and&nbsp;<code>abort_unless()</code>.
                </p>
                <pre><code data-theme="olaolu-palenight" data-lang="php" class="torchlight"
                           style="background-color: #292D3E; --theme-selection-background: #7580B850;"><div
                            class="line"><span style="color: #C792EA;">public</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #C792EA;">function</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #82AAFF;">update</span><span
                                style="color: #D9F5DD;">(</span><span style="color: #FFCB8B;">Request</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #BEC5D4;">$request</span><span
                                style="color: #BFC7D5;">, </span><span style="color: #FFCB8B;">Record</span><span
                                style="color: #BFC7D5;">&nbsp;</span><span>
                                style="color: #BEC5D4;">$record</span><span style="color: #D9F5DD;">)</span></div><div
                            class="line"><span style="color: #BFC7D5;">{</span></div><div class="line"><span
                                style="color: #BFC7D5;">    </span><span
                                style="color: #82AAFF;">abort_if</span><span style="color: #BFC7D5;">(</span></div><div
                            class="line"><span style="color: #82AAFF;">        </span><span style="color: #BFC7D5;">$</span><span
                                style="color: #BEC5D4;">condition</span><span style="color: #BFC7D5;">,</span><span
                                style="color: #82AAFF;"> </span><span style="color: #FFCB8B;">Response</span><span
                                style="color: #89DDFF;">::</span><span
                                style="color: #82AAFF;">HTTP_CONFLICT</span><span
                                style="color: #BFC7D5;">,</span><span style="color: #82AAFF;"> </span><span
                                style="color: #D9F5DD;">'</span><span style="color: #C3E88D;">The record was updated since&nbsp;reading.</span><span
                                style="color: #D9F5DD;">'</span></div><div class="line"><span
                                style="color: #82AAFF;">    </span><span style="color: #BFC7D5;">);</span></div><div
                            class="line">&nbsp;</div><div class="line"><span
                                style="color: #BFC7D5;">    </span><span style="color: #697098;">//</span><span
                                style="color: #697098;">&nbsp;...</span></div><div class="line"><span
                                style="color: #BFC7D5;">}</span></div></code></pre>
                <p>This will throw an instance of <code>Symfony\Component\HttpKernel\Exception\HttpException</code> with
                    the status code set to <code>409</code> and the message set to <code>'The record was updated since&nbsp;reading.'</code>.
                </p>
                <p>Laravel's exception handler will then create a nice response with the specified status code and a
                    standardised body&nbsp;of:</p>
                <pre><code data-theme="olaolu-palenight" data-lang="json" class="torchlight"
                           style="background-color: #292D3E; --theme-selection-background: #7580B850;"><!-- Syntax highlighted by torchlight.dev --><div
                            class="line"><span style="color: #BFC7D5;">{</span></div><div class="line"><span
                                style="color: #BFC7D5;">    </span><span
                                style="color: #C3E88D;">"message"</span><span style="color: #BFC7D5;">: </span><span
                                style="color: #D9F5DD;">"</span><span style="color: #80CBC4;">The record was updated since&nbsp;reading.</span><span
                                style="color: #D9F5DD;">"</span></div><div class="line"><span
                                style="color: #BFC7D5;">}</span></div></code></pre>
                <p>As a bonus, when <code>APP_DEBUG</code> is set, it will also include additional debugging fields such
                    as the file and line number where the exception occurred, as well as a stack&nbsp;trace.</p>
                <p>Because it's a <code>HttpException</code>, Laravel won't report it by default, which is generally
                    what we want with a 40x client&nbsp;error.</p>
                <p>But as much as I love these helpers, there are two scenarios where I don't like to&nbsp;use&nbsp;them:</p>
                <ol>
                    <li>
                        <strong>When the scenario occurs outside of a controller.</strong><br>
                        <code>abort_if()</code> throws a <code>HttpException</code>, so I believe it's only appropriate
                        to throw this within files contained in the <code>App\Http</code> namespace. Anywhere else is
                        not a HTTP-specific concern, so a HTTP-specific exception doesn't feel&nbsp;appropriate.
                    </li>
                    <li>
                        <strong>When the same scenario occurs in multiple places and we want to centralise the error
                            message and/or be able to report the error&nbsp;consistently.</strong>
                    </li>
                </ol>
                <p>So what are the&nbsp;alternatives?</p>
                <h2>Renderable&nbsp;Exceptions</h2>
                <p>Laravel allows you to create <a href="https://laravel.com/docs/8.x/errors#renderable-exceptions">renderable
                        exceptions</a> with the <code>artisan make:exception --render</code> command that will generate
                    an exception class like&nbsp;this:</p>
                <pre><code data-theme="olaolu-palenight" data-lang="php" class="torchlight"
                           style="background-color: #292D3E; --theme-selection-background: #7580B850;"><!-- Syntax highlighted by torchlight.dev --><div
                            class="line"><span style="color: #D3423E;">&lt;?php</span></div><div
                            class="line">&nbsp;</div><div class="line"><span
                                style="color: #C792EA;">namespace</span><span style="color: #BFC7D5;">&nbsp;App\Exceptions;</span></div><div
                            class="line">&nbsp;</div><div class="line"><span style="color: #C792EA;">use</span><span
                                style="color: #BFC7D5;">&nbsp;</span><span
                                style="color: #FFCB6B;">Exception</span><span style="color: #BFC7D5;">;</span></div><div
                            class="line">&nbsp;</div><div class="line"><span
                                style="color: #C792EA;">class</span><span style="color: #BFC7D5;"> </span><span
                                style="color: #FFCB6B;">RecordConflictException</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #C792EA;">extends</span><span
                                style="color: #BFC7D5;">&nbsp;</span><span style="color: #FFCB6B;">Exception</span></div><div
                            class="line"><span style="color: #BFC7D5;">{</span></div><div class="line"><span
                                style="color: #BFC7D5;">    </span><span style="color: #C792EA;">public</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #C792EA;">function</span><span
                                style="color: #BFC7D5;">&nbsp;</span><span
                                style="color: #82AAFF;">render</span><span style="color: #D9F5DD;">(</span><span
                                style="color: #BEC5D4;">$request</span><span style="color: #D9F5DD;">)</span></div><div
                            class="line"><span style="color: #BFC7D5;">    {</span></div><div class="line"><span
                                style="color: #BFC7D5;">        </span><span
                                style="color: #C792EA;">return</span><span
                                style="color: #BFC7D5;">&nbsp;</span><span
                                style="color: #82AAFF;">response</span><span style="color: #BFC7D5;">(</span><span
                                style="color: #89DDFF;">...</span><span style="color: #BFC7D5;">);</span></div><div
                            class="line"><span style="color: #BFC7D5;">    }</span></div><div class="line"><span
                                style="color: #BFC7D5;">}</span></div></code></pre>
                <p>Which we can throw with another of my favourite pairs of helpers, <code>throw_if()</code>
                    and&nbsp;<code>throw_unless()</code>:</p>
                <pre><code data-theme="olaolu-palenight" data-lang="php" class="torchlight"
                           style="background-color: #292D3E; --theme-selection-background: #7580B850;"><!-- Syntax highlighted by torchlight.dev --><div
                            class="line"><span style="color: #82AAFF;">throw_if</span><span style="color: #BFC7D5;">($</span><span
                                style="color: #BEC5D4;">condition</span><span style="color: #BFC7D5;">,</span><span
                                style="color: #82AAFF;">&nbsp;</span><span style="color: #FFCB8B;">RecordConflictException</span><span
                                style="color: #89DDFF;">::</span><span style="color: #C792EA;">class</span><span
                                style="color: #BFC7D5;">);</span></div></code></pre>
                <p>The downside with renderable&nbsp;exceptions&nbsp;are:</p>
                <ul>
                    <li>It's now our responsibility to return that standard response structure and to keep it
                        consistent. This is especially painful when you want the extra debugging&nbsp;fields.
                    </li>
                    <li>The exception will be reported by default, which may not be what we want. This is easy enough to
                        disable by implementing the <code>report()</code> method and returning false, but it's something
                        we need to remember to&nbsp;do.
                    </li>
                </ul>
                <h2>Extending&nbsp;<code>HttpException</code></h2>
                <p>We could extend Symfony's <code>HttpException</code> class, or one of it's subclasses, so that
                    Laravel will handle the response for&nbsp;us:</p>
                <pre><code data-theme="olaolu-palenight" data-lang="php" class="torchlight"
                           style="background-color: #292D3E; --theme-selection-background: #7580B850;"><!-- Syntax highlighted by torchlight.dev --><div
                            class="line"><span style="color: #D3423E;">&lt;?php</span></div><div
                            class="line">&nbsp;</div><div class="line"><span
                                style="color: #C792EA;">namespace</span><span style="color: #BFC7D5;">&nbsp;App\Exceptions;</span></div><div
                            class="line">&nbsp;</div><div class="line"><span style="color: #C792EA;">use</span><span
                                style="color: #BFC7D5;">&nbsp;Symfony\Component\HttpKernel\Exception\</span><span
                                style="color: #FFCB8B;">HttpException</span><span
                                style="color: #BFC7D5;">;</span></div><div class="line">&nbsp;</div><div
                            class="line"><span style="color: #C792EA;">class</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #FFCB6B;">RecordConflictHttpException</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #C792EA;">extends</span><span
                                style="color: #BFC7D5;">&nbsp;</span><span style="color: #A9C77D;">ConflictHttpException</span></div><div
                            class="line"><span style="color: #BFC7D5;">{</span></div><div class="line"><span
                                style="color: #BFC7D5;">    </span><span style="color: #C792EA;">public</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #C792EA;">function</span><span
                                style="color: #BFC7D5;">&nbsp;</span><span
                                style="color: #89DDFF;">__construct</span><span
                                style="color: #D9F5DD;">(</span></div><div class="line"><span
                                style="color: #BFC7D5;">        </span><span style="color: #89DDFF;">?</span><span
                                style="color: #C792EA;">string</span><span style="color: #BFC7D5;"> </span><span
                                style="color: #BEC5D4;">$message</span><span style="color: #BFC7D5;"> </span><span
                                style="color: #C792EA;">=</span><span style="color: #BFC7D5;"> </span><span
                                style="color: #D9F5DD;">'</span><span style="color: #C3E88D;">The record was updated since&nbsp;reading.</span><span
                                style="color: #D9F5DD;">'</span><span style="color: #BFC7D5;">,</span></div><div
                            class="line"><span style="color: #BFC7D5;">        \</span><span
                                style="color: #FFCB8B;">Throwable</span><span style="color: #BFC7D5;"> </span><span
                                style="color: #BEC5D4;">$previous</span><span style="color: #BFC7D5;"> </span><span
                                style="color: #C792EA;">=</span><span style="color: #BFC7D5;">&nbsp;</span><span
                                style="color: #82AAFF;">null</span><span style="color: #BFC7D5;">,</span></div><div
                            class="line"><span style="color: #BFC7D5;">        </span><span style="color: #C792EA;">int</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #BEC5D4;">$code</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #C792EA;">=</span><span
                                style="color: #BFC7D5;">&nbsp;</span><span style="color: #F78C6C;">0</span><span
                                style="color: #BFC7D5;">,</span></div><div class="line"><span
                                style="color: #BFC7D5;">        </span><span
                                style="color: #C792EA;">array</span><span style="color: #BFC7D5;"> </span><span
                                style="color: #BEC5D4;">$headers</span><span style="color: #BFC7D5;"> </span><span
                                style="color: #C792EA;">=</span><span style="color: #BFC7D5;">&nbsp;[]</span></div><div
                            class="line"><span style="color: #BFC7D5;">    </span><span
                                style="color: #D9F5DD;">)</span><span style="color: #BFC7D5;">&nbsp;{</span></div><div
                            class="line"><span style="color: #BFC7D5;">        </span><span style="color: #C792EA;">parent</span><span
                                style="color: #89DDFF;">::</span><span
                                style="color: #82AAFF;">__construct</span><span
                                style="color: #BFC7D5;">(</span><span style="color: #BEC5D4;">$message</span><span
                                style="color: #BFC7D5;">, </span><span style="color: #BEC5D4;">$previous</span><span
                                style="color: #BFC7D5;">, </span><span style="color: #BEC5D4;">$code</span><span
                                style="color: #BFC7D5;">,&nbsp;</span><span
                                style="color: #BEC5D4;">$headers</span><span style="color: #BFC7D5;">);</span></div><div
                            class="line"><span style="color: #BFC7D5;">    }</span></div><div class="line"><span
                                style="color: #BFC7D5;">}</span></div></code></pre>
                <p>As above, this can be thrown as&nbsp;follows:</p>
                <pre><code data-theme="olaolu-palenight" data-lang="php" class="torchlight"
                           style="background-color: #292D3E; --theme-selection-background: #7580B850;"><!-- Syntax highlighted by torchlight.dev --><div
                            class="line"><span style="color: #82AAFF;">throw_if</span><span style="color: #BFC7D5;">($</span><span
                                style="color: #BEC5D4;">condition</span><span style="color: #BFC7D5;">,</span><span
                                style="color: #82AAFF;">&nbsp;</span><span style="color: #FFCB8B;">RecordConflictHttpException</span><span
                                style="color: #89DDFF;">::</span><span style="color: #C792EA;">class</span><span
                                style="color: #BFC7D5;">);</span></div></code></pre>
                <p>Because it's a <code>HttpException</code>, Laravel won't report it by default. The downside is that
                    our exception is now a <code>HttpException</code>, so it's not really appropriate to use it outside
                    of the HTTP-specific parts of our application, and certainly not within a command or&nbsp;job.</p>
                <p><strong>So how can we get the best of both&nbsp;worlds?</strong></p>
                <h2>Implementing&nbsp;<code>HttpExceptionInterface</code></h2>
                <p>Instead of extending <code>HttpException</code>, we can implement the
                    <code>HttpExceptionInterface</code> which requires that we implement the
                    <code>getStatusCode()</code> and <code>getHeaders()</code>&nbsp;methods:</p>
                <pre><code data-theme="olaolu-palenight" data-lang="php" class="torchlight"
                           style="background-color: #292D3E; --theme-selection-background: #7580B850;"><!-- Syntax highlighted by torchlight.dev --><div
                            class="line"><span style="color: #D3423E;">&lt;?php</span></div><div
                            class="line">&nbsp;</div><div class="line"><span
                                style="color: #C792EA;">namespace</span><span style="color: #BFC7D5;">&nbsp;App\Exceptions;</span></div><div
                            class="line">&nbsp;</div><div class="line"><span style="color: #C792EA;">use</span><span
                                style="color: #BFC7D5;">&nbsp;</span><span
                                style="color: #FFCB6B;">Exception</span><span style="color: #BFC7D5;">;</span></div><div
                            class="line"><span style="color: #C792EA;">use</span><span style="color: #BFC7D5;">&nbsp;Symfony\Component\HttpKernel\Exception\</span><span
                                style="color: #FFCB8B;">HttpExceptionInterface</span><span
                                style="color: #BFC7D5;">;</span></div><div class="line">&nbsp;</div><div
                            class="line"><span style="color: #C792EA;">class</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #FFCB6B;">RecordConflictException</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #C792EA;">extends</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #FFCB6B;">Exception</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #C792EA;">implements</span><span
                                style="color: #BFC7D5;">&nbsp;</span><span style="color: #A9C77D;">HttpExceptionInterface</span></div><div
                            class="line"><span style="color: #BFC7D5;">{</span></div><div class="line"><span
                                style="color: #BFC7D5;">    </span><span
                                style="color: #C792EA;">protected</span><span style="color: #BFC7D5;"> </span><span
                                style="color: #BEC5D4;">$message</span><span style="color: #BFC7D5;"> </span><span
                                style="color: #C792EA;">=</span><span style="color: #BFC7D5;"> </span><span
                                style="color: #D9F5DD;">'</span><span style="color: #C3E88D;">The record was updated since&nbsp;reading.</span><span
                                style="color: #D9F5DD;">'</span><span style="color: #BFC7D5;">;</span></div><div
                            class="line">&nbsp;</div><div class="line"><span
                                style="color: #BFC7D5;">    </span><span style="color: #C792EA;">public</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #C792EA;">function</span><span
                                style="color: #BFC7D5;">&nbsp;</span><span
                                style="color: #82AAFF;">getStatusCode</span><span style="color: #D9F5DD;">()</span></div><div
                            class="line"><span style="color: #BFC7D5;">    {</span></div><div class="line"><span
                                style="color: #BFC7D5;">        </span><span
                                style="color: #C792EA;">return</span><span
                                style="color: #BFC7D5;">&nbsp;</span><span style="color: #F78C6C;">409</span><span
                                style="color: #BFC7D5;">;</span></div><div class="line"><span
                                style="color: #BFC7D5;">    }</span></div><div class="line">&nbsp;</div><div
                            class="line"><span style="color: #BFC7D5;">    </span><span style="color: #C792EA;">public</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #C792EA;">function</span><span
                                style="color: #BFC7D5;">&nbsp;</span><span style="color: #82AAFF;">getHeaders</span><span
                                style="color: #D9F5DD;">()</span></div><div class="line"><span
                                style="color: #BFC7D5;">    {</span></div><div class="line"><span
                                style="color: #BFC7D5;">        </span><span
                                style="color: #C792EA;">return</span><span style="color: #BFC7D5;">&nbsp;[];</span></div><div
                            class="line"><span style="color: #BFC7D5;">    }</span></div><div class="line"><span
                                style="color: #BFC7D5;">}</span></div></code></pre>
                <p>By implementing <code>HttpExceptionInterface</code>, Laravel will automatically generate our response
                    for&nbsp;us.</p>
                <p>And because we're just extending <code>Exception</code> instead of <code>HttpException</code>, I feel
                    like this is appropriate to throw from&nbsp;anywhere.</p>
                <p><em><strong>It's not a HTTP exception, it's a regular exception with
                            HTTP&nbsp;abilities!</strong></em></p>
                <p>But there are still a few&nbsp;loose&nbsp;ends:</p>
                <ul>
                    <li>This exception will be reported by default, which may not be what we&nbsp;want.</li>
                    <li>There is too much boilerplate for my&nbsp;liking.</li>
                </ul>
                <h2>Introducing <code>Httpable</code>&nbsp;Exceptions</h2>
                <p>We can move the boilerplate code to a trait, which we'll call <code>Httpable</code>, where we can
                    also handle&nbsp;reporting:</p>
                <pre><code data-theme="olaolu-palenight" data-lang="php" class="torchlight"
                           style="background-color: #292D3E; --theme-selection-background: #7580B850;"><!-- Syntax highlighted by torchlight.dev --><div
                            class="line"><span style="color: #D3423E;">&lt;?php</span></div><div
                            class="line">&nbsp;</div><div class="line"><span
                                style="color: #C792EA;">namespace</span><span style="color: #BFC7D5;">&nbsp;App\Exceptions;</span></div><div
                            class="line">&nbsp;</div><div class="line"><span style="color: #C792EA;">use</span><span
                                style="color: #BFC7D5;">&nbsp;Illuminate\Foundation\</span><span
                                style="color: #FFCB8B;">Application</span><span
                                style="color: #BFC7D5;">;</span></div><div class="line">&nbsp;</div><div
                            class="line"><span style="color: #C792EA;">trait</span><span style="color: #BFC7D5;">&nbsp;Httpable</span></div><div
                            class="line"><span style="color: #BFC7D5;">{</span></div><div class="line"><span
                                style="color: #BFC7D5;">    </span><span style="color: #C792EA;">public</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #C792EA;">function</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #82AAFF;">report</span><span
                                style="color: #D9F5DD;">(</span><span
                                style="color: #FFCB8B;">Application</span><span
                                style="color: #BFC7D5;">&nbsp;</span><span style="color: #BEC5D4;">$app</span><span
                                style="color: #D9F5DD;">)</span></div><div class="line"><span
                                style="color: #BFC7D5;">    {</span></div><div class="line"><span
                                style="color: #BFC7D5;">        </span><span style="color: #697098;">//</span><span
                                style="color: #697098;"> Report only when running in a queued job or scheduled&nbsp;task.</span></div><div
                            class="line"><span style="color: #BFC7D5;">        </span><span style="color: #C792EA;">return</span><span
                                style="color: #BFC7D5;">&nbsp;</span><span style="color: #BEC5D4;">$app</span><span
                                style="color: #89DDFF;">-&gt;</span><span
                                style="color: #82AAFF;">runningInConsole</span><span
                                style="color: #BFC7D5;">();</span></div><div class="line"><span
                                style="color: #BFC7D5;">    }</span></div><div class="line">&nbsp;</div><div
                            class="line"><span style="color: #BFC7D5;">    </span><span style="color: #C792EA;">public</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #C792EA;">function</span><span
                                style="color: #BFC7D5;">&nbsp;</span><span
                                style="color: #82AAFF;">getStatusCode</span><span style="color: #D9F5DD;">()</span></div><div
                            class="line"><span style="color: #BFC7D5;">    {</span></div><div class="line"><span
                                style="color: #BFC7D5;">        </span><span
                                style="color: #C792EA;">return</span><span style="color: #BFC7D5;"> </span><span
                                style="color: #FF5572;">$this</span><span
                                style="color: #89DDFF;">-&gt;statusCode</span><span style="color: #BFC7D5;"> </span><span
                                style="color: #89DDFF;">??</span><span style="color: #BFC7D5;">&nbsp;</span><span
                                style="color: #F78C6C;">500</span><span style="color: #BFC7D5;">;</span></div><div
                            class="line"><span style="color: #BFC7D5;">    }</span></div><div
                            class="line">&nbsp;</div><div class="line"><span
                                style="color: #BFC7D5;">    </span><span style="color: #C792EA;">public</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #C792EA;">function</span><span
                                style="color: #BFC7D5;">&nbsp;</span><span style="color: #82AAFF;">getHeaders</span><span
                                style="color: #D9F5DD;">()</span></div><div class="line"><span
                                style="color: #BFC7D5;">    {</span></div><div class="line"><span
                                style="color: #BFC7D5;">        </span><span
                                style="color: #C792EA;">return</span><span style="color: #BFC7D5;"> </span><span
                                style="color: #FF5572;">$this</span><span
                                style="color: #89DDFF;">-&gt;headers</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #89DDFF;">??</span><span
                                style="color: #BFC7D5;">&nbsp;[];</span></div><div class="line"><span
                                style="color: #BFC7D5;">    }</span></div><div class="line"><span
                                style="color: #BFC7D5;">}</span></div></code></pre>
                <p>And now we create a tidy exception, with a centralised message, that we can throw from any context,
                    with a nice JSON&nbsp;response!</p>
                <pre><code data-theme="olaolu-palenight" data-lang="php" class="torchlight"
                           style="background-color: #292D3E; --theme-selection-background: #7580B850;"><!-- Syntax highlighted by torchlight.dev --><div
                            class="line"><span style="color: #D3423E;">&lt;?php</span></div><div
                            class="line">&nbsp;</div><div class="line"><span
                                style="color: #C792EA;">namespace</span><span style="color: #BFC7D5;">&nbsp;App\Exceptions;</span></div><div
                            class="line">&nbsp;</div><div class="line"><span style="color: #C792EA;">use</span><span
                                style="color: #BFC7D5;">&nbsp;App\Exceptions\</span><span style="color: #FFCB8B;">Httpable</span><span
                                style="color: #BFC7D5;">;</span></div><div class="line"><span
                                style="color: #C792EA;">use</span><span style="color: #BFC7D5;">&nbsp;</span><span
                                style="color: #FFCB6B;">Exception</span><span style="color: #BFC7D5;">;</span></div><div
                            class="line"><span style="color: #C792EA;">use</span><span style="color: #BFC7D5;">&nbsp;Symfony\Component\HttpFoundation\</span><span
                                style="color: #FFCB8B;">Response</span><span style="color: #BFC7D5;">;</span></div><div
                            class="line"><span style="color: #C792EA;">use</span><span style="color: #BFC7D5;">&nbsp;Symfony\Component\HttpKernel\Exception\</span><span
                                style="color: #FFCB8B;">HttpExceptionInterface</span><span
                                style="color: #BFC7D5;">;</span></div><div class="line">&nbsp;</div><div
                            class="line"><span style="color: #C792EA;">class</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #FFCB6B;">RecordConflictException</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #C792EA;">extends</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #FFCB6B;">Exception</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #C792EA;">implements</span><span
                                style="color: #BFC7D5;">&nbsp;</span><span style="color: #A9C77D;">HttpExceptionInterface</span></div><div
                            class="line"><span style="color: #BFC7D5;">{</span></div><div class="line"><span
                                style="color: #BFC7D5;">    </span><span style="color: #C792EA;">use</span><span
                                style="color: #BFC7D5;">&nbsp;</span><span
                                style="color: #FFCB8B;">Httpable</span><span style="color: #BFC7D5;">;</span></div><div
                            class="line">&nbsp;</div><div class="line"><span
                                style="color: #BFC7D5;">    </span><span
                                style="color: #C792EA;">protected</span><span style="color: #BFC7D5;"> </span><span
                                style="color: #BEC5D4;">$message</span><span style="color: #BFC7D5;"> </span><span
                                style="color: #C792EA;">=</span><span style="color: #BFC7D5;"> </span><span
                                style="color: #D9F5DD;">'</span><span style="color: #C3E88D;">The record was updated since&nbsp;reading.</span><span
                                style="color: #D9F5DD;">'</span><span style="color: #BFC7D5;">;</span></div><div
                            class="line">&nbsp;</div><div class="line"><span
                                style="color: #BFC7D5;">    </span><span
                                style="color: #C792EA;">protected</span><span style="color: #BFC7D5;"> </span><span
                                style="color: #BEC5D4;">$statusCode</span><span
                                style="color: #BFC7D5;"> </span><span style="color: #C792EA;">=</span><span
                                style="color: #BFC7D5;">&nbsp;</span><span
                                style="color: #FFCB8B;">Response</span><span style="color: #89DDFF;">::</span><span
                                style="color: #82AAFF;">HTTP_CONFLICT</span><span
                                style="color: #BFC7D5;">;</span></div><div class="line"><span
                                style="color: #BFC7D5;">}</span></div></code></pre>
            </div>
        </div>
    </main>

    <x-footer is_links="true"/>
</x-default-layout>
