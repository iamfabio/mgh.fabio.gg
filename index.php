<?php
require_once 'functions.php';
getHeader(
    'Home',
    'Welcome to the unofficial Midnight Ghost Hunt Discord Moderation Guide. This website aims to provide a simpler guide than the official guide (made by Poggers#0001 and Dark#1010), leaving out rules that are common sense and/or obvious.',
    '',
    '<div class="spooky">
    <div class="container">
        <strong>Boo! Spooky, right?</strong>
    </div>
</div>'
);
?>

    <div class="container">
        <article> <!--data-spy="scroll" data-target="#menu" class="position-relative"-->
            <section id="rules">
                <h2>Rules</h2>
                <ul>
                    <li>
                        No personal attacks, offensive language, harassment, witchhunting, sexism, racism, hate speech
                        or other disruptive behavior, this also applies to voice chats. Disruptive behaviour in voice
                        includes voice changers, soundboards, extremely loud noises, etc.
                    </li>
                    <li>
                        No pinging/mentioning users who are not currently engaged in the chat unless they're okay with
                        it.
                    </li>
                    <li>
                        No impersonating. No pretending to be staff.
                    </li>
                    <li>
                        No inappropriate or invisible usernames, nicknames and profile pictures. This includes names
                        with excessive use of unusual Unicode characters.
                    </li>
                    <li>
                        No spamming (messages, emotes, mentions).
                    </li>
                    <li>
                        No advertising (Discord invite links & other).
                    </li>
                    <li>
                        No illegal content (scam links, IP grabbers, includes URL shorteners).
                    </li>
                    <li>
                        No <strong>N</strong>ot <strong>S</strong>afe <strong>F</strong>or <strong>W</strong>ork
                        content (porn, gore, suggestive content).
                    </li>
                    <li>
                        No spoilers regarding recent/upcoming movies, games, tv shows, etc.
                    </li>
                    <li>
                        Using the appropriate text channels for discussions.
                    </li>
                    <li>
                        English only.
                    </li>
                    <li>
                        No violations against <a href="https://discordapp.com/terms/" target="_blank"
                                                 title="Discord Terms of Service" class="external">Terms of Service</a>,
                        <a href="https://discordapp.com/guidelines/" target="_blank"
                           title="Discord Community Guidelines" class="external">Community Guidelines</a> and <a
                                href="https://support.discordapp.com/hc/en-us/articles/360024871991/" target="_blank"
                                title="Discord Partnership Code of Conduct" class="external">Partnership Code of
                            Conduct</a>.
                    </li>
                </ul>
            </section>
            <section id="commands">
                <h2>Commands</h2>
                <p>
                    <strong>A complete list of commands can be found on
                        <a href="https://zeppelin.gg/docs/" title="Official Zeppelin Documentation" class="external"
                           target="_blank">the official Zeppelin Documentation website</a>.</strong>
                </p>
                <p>The prefix for all commands is <code>!</code>.</p>
                <p>Arguments surrounded by <code>&lt;&gt;</code> are required, while <code>[]</code> are optional.</p>
                <h3>Information</h3>
                <ul>
                    <li>
                        <code>!case &lt;number&gt;</code>
                        <p>Shows details about the specified case.</p>
                    </li>
                    <li>
                        <code>!cases &lt;user&gt;</code>
                        <p>Lists all cases by the specified user.</p>
                    </li>
                    <li>
                        <code>!info &lt;user&gt;</code>
                        <p>Shows an info pane of the specified user. Includes their join date, registration date, recent
                            cases, etc.</p>
                    </li>
                    <li>
                        <code>!mutes</code>
                        <p>Lists all currently active mutes on the server.</p>
                    </li>
                    <li>
                        <code>!names &lt;user&gt;</code>
                        <p>Shows the specified user's recent usernames/nicknames.</p>
                    </li>
                    <li>
                        <code>!ping</code>
                        <div class="tag">Admin only</div>
                        <p>Check the bot's current latency (200-400ms for the mean value is normal).</p>
                    </li>
                    <li>
                        <code>!roles [--counts]</code>
                        <p>Displays a list of roles.</p>
                    </li>
                    <li>
                        <code>!search [--role=id] [--sort=sortby] [--voice]</code>
                        <p>Searches through the member list.</p>
                    </li>
                    <li>
                        <code>!server</code>
                        <p>Show information about the server.</p>
                    </li>
                </ul>
                <h3>Moderation</h3>
                <ul>
                    <li>
                        <code>!ban &lt;user&gt; [reason]</code>
                        <p>Bans the specified user with the given reason. Based on server settings, can <em>DM or
                                message the user first</em> (off by default). Equivalent to right-click banning a user
                            and
                            writing the reason there.</p>
                    </li>
                    <li>
                        <code>!clean &lt;count&gt;</code><br>
                        <code>!clean user &lt;user ID&gt; &lt;count&gt;</code><br>
                        <code>!clean bot &lt;count&gt;</code>
                        <p>Cleans the last <em>n</em> messages from the current channel.</p>
                    </li>
                    <li>
                        <code>!forceban &lt;user ID&gt;</code>
                        <p>Bans a user that has left the server. User will not be messaged in any way.</p>
                    </li>
                    <li>
                        <code>!kick &lt;user&gt; [reason]</code>
                        <p>Kicks the specified user with the given reason. Based on server settings, can <em>DM or
                                message the user first</em> (off by default).</p>
                    </li>
                    <li>
                        <code>!massban &lt;user ID&gt; [user ID]</code>
                        <div class="tag">Admin only</div>
                        <p>Bans all specified user IDs. Limited to 50 bans per command.</p>
                    </li>
                    <li>
                        <code>!mute &lt;user&gt; [time] [reason]</code>
                        <p>Mutes the specified user for the specified duration with the given reason. Based on server
                            settings, can <em>DM or message the user first</em> (off by default). Time can be omitted
                            for an indefinite mute.</p>
                    </li>
                    <li>
                        <code>!nick &lt;user&gt; &lt;name&gt;</code>
                        <p>Change a server member's nickname.</p>
                    </li>
                    <li>
                        <code>!softban &lt;user&gt;</code>
                        <p>Bans and instantly un-bans the specified user. Can be used for kicking and cleaning a user's
                            recent messages at the same time.</p>
                    </li>
                    <li>
                        <code>!unban &lt;user ID&gt; [reason]</code>
                        <p>Un-bans the specified user with the given reason. User does not get messages for this.</p>
                    </li>
                    <li>
                        <code>!unmute &lt;user&gt; [time] [reason]</code>
                        <p>Un-mutes the specified user after the specified time with the given reason. Time can be
                            omitted for an instant unmute.</p>
                    </li>
                    <li>
                        <code>!vcmove &lt;user&gt; &lt;channel&gt;</code>
                        <p>Move the specified member to a different voice channel. &lt;channel&gt; uses fuzzy matching
                            for the channel's name, or the channel ID.</p>
                    </li>
                    <li>
                        <code>!warn &lt;user&gt; &lt;message&gt;</code>
                        <p>Warns the specified user. Based on server settings, <em>the warning will be sent through
                                DMs</em>, on a specific server channel, or not at all.</p>
                    </li>
                </ul>
                <h3>Utility</h3>
                <ul>
                    <li>
                        <code>!addcase &lt;type&gt; &lt;user&gt; [reason]</code>
                        <p>Creates a case with the specified type (note, warn, kick, ban, mute, unmute). Useful for e.g.
                            logging verbal warnings <em>without</em> sending the warning a second time as a DM.</p>
                    </li>
                    <li>
                        <code>!hidecase &lt;number&gt;</code>
                        <div class="tag">Admin only</div>
                        <p>Hides the specified case from case listings. Can still be accessed via <code>!case</code>.
                            Useful for hiding accidental/meme cases.</p>
                    </li>
                    <li>
                        <code>!note &lt;user&gt; &lt;message&gt;</code>
                        <p>Adds a note to the user. User does <em>not</em> get messaged/informed about this.</p>
                    </li>
                    <li>
                        <code>!reload_guild</code>
                        <div class="tag">Admin only</div>
                        <p>Reloads the guild's configuration.</p>
                    </li>
                    <li>
                        <code>!unhidecase &lt;number&gt;</code>
                        <div class="tag">Admin only</div>
                        <p>Un-hides a previously hidden case.</p>
                    </li>
                    <li>
                        <code>!update &lt;number&gt; &lt;new details&gt;</code>
                        <p>Updates a case by adding a new note to it.</p>
                    </li>
                </ul>
                <h3>Tags</h3>
                <ul>
                    <li>
                        <code>!tag &lt;name&gt; &lt;message&gt;</code>
                        <p>Creates a tag with the specified name and message.</p>
                    </li>
                    <li>
                        <code>!tag delete &lt;name&gt;</code>
                        <p>Deletes the specified tag.</p>
                    </li>
                    <li>
                        <code>!tag list</code>
                        <p>Lists all available tags.</p>
                    </li>
                    <li>
                        <code>!!tag</code>
                        <p>Uses the specified tag.</p>
                    </li>
                </ul>
            </section>
            <section id="actions">
                <h2>Actions</h2>
                <p>All commands should be used in <strong>#bot-commands</strong> unless immediate action is required.
                    The right-click kick/ban action should also only be used in urgent situations.</p>
                <h3>Usual procedure</h3>
                <ol style="list-style-type: decimal;">
                    <li>
                        Check user's cases
                        <ul>
                            <li>
                                Use <code>!cases &lt;user ID&gt; -e</code> to get a list of all infractions of the
                                specified user.
                            </li>
                        </ul>
                    </li>
                    <li>
                        Warning
                        <ul>
                            <li>
                                Use <code>!warn &lt;user&gt; [reason]</code> to warn the user.
                                This sends the user a DM.
                            </li>
                            <li>
                                If the warning was made verbally, make sure to add the warning to the infractions log by
                                using <code>!addcase warn &lt;user&gt; [reason]</code>.
                            </li>
                        </ul>
                    </li>
                    <li>
                        Timed Mute
                        <ul>
                            <li>
                                Use <code>!mute &lt;user&gt; [time] [reason]</code> to mute the user temporarily.
                                At least a period of <em>15 minutes</em> is required.
                                This sends the user a DM.
                            </li>
                        </ul>
                    </li>
                    <li>
                        Indefinite Mute
                        <ul>
                            <li>
                                Use <code>!mute &lt;user&gt; [reason]</code> to mute the user indefinitely.
                                The user will have to appeal the mute via ModMail.
                                This sends the user a DM.
                            </li>
                        </ul>
                    </li>
                    <li>
                        Ban
                        <ul>
                            <li>
                                Use <code>!ban &lt;user&gt; [reason]</code> to ban the user indefinitely.
                                This sends the user a DM.
                            </li>
                        </ul>
                    </li>
                </ol>
                <h3>Special cases</h3>
                <ul>
                    <li>
                        Mass-pinging users/roles is generally not allowed and may result in a warning (case-by-case).
                    </li>
                    <li>
                        If a user appealed the indefinite mute, make sure to include the log link (<code>!loglink</code>)
                        in the reason. The user does <em>not</em> get notified.
                    </li>
                    <li>
                        Mass direct messaging members, racism and advertising cheats (and similar) are not permitted and
                        result in an immediate and permanent ban.
                    </li>
                    <li>
                        Punishment evasion is judged on a case-by-case basis. Mute both accounts indefinitely in most to
                        all cases. If a user is evading a permanent mute or ban, ban the new account (and the old
                        account in case of a permanent mute).
                    </li>
                    <li>
                        Offensive or <abbr title="Not Suited For Work">NSFW</abbr> usernames, avatars and statuses are
                        prohibited and result in a temporary mute until the user changes their respective account
                        setting.
                    </li>
                    <li>
                        If a member is direct messaging another member and gets either harassed or an advertisement,
                        instruct the member to block and report the malicious user via the built-in function.
                        Remember to warn, and ban on repeated violation.
                        You can send the following link to the user for a useful guide on how to correctly report users:
                        <a href="https://dis.gd/howtoreport/" target="_blank" class="external"
                           title="How To Report Guide">https://dis.gd/howtoreport/</a>
                    </li>
                    <li>
                        Channel or mention misuse leads to a warning. If they should continue, mute the user.
                    </li>
                    <li>
                        <abbr title="Not Suited For Work">NSFW</abbr> content is not permitted and result in a warning.
                        Ban if the user should continue.
                    </li>
                    <li>
                        Anything against <a href="https://discordapp.com/terms/" target="_blank" class="external"
                                            title="Discord Terms of Service">Terms of Service</a> or
                        <a href="https://discordapp.com/guidelines/" target="_blank" class="external"
                           title="Discord Community Guidelines">Community Guidelines</a>
                        is bannable and should be <a href="https://dis.gd/contact/" target="_blank" class="external"
                                                     title="Contact Discord">directly reported to Discord</a> (send an
                        email instead: <a href="mailto:abuse@discordapp.com" class="external" title="Contact Discord">
                            abuse@discordapp.com</a>).<br>
                        This includes but is not limited to:
                        <ul>
                            <li>
                                A user is below the required age of 13.
                            </li>
                            <li>
                                Raiding the server.
                            </li>
                            <li>
                                Harassing or threatening another user.
                            </li>
                            <li>
                                Spam accounts, self bots and unsolicited server invites/friend requests.
                            </li>
                            <li>
                                Pornography of minors.
                            </li>
                            <li>
                                Promotion of self-harm or suicide.
                            </li>
                            <li>
                                Gore and animal cruelty.
                            </li>
                            <li>
                                Distribution of phishing links, viruses, or cheats and likewise.
                            </li>
                        </ul>
                    </li>
                    <li>
                        If a user violates the
                        <a href="https://support.discordapp.com/hc/en-us/articles/360024871991/" target="_blank"
                           class="external" title="Discord Partnership Code of Conduct">Partnership Code of Conduct</a>,
                        please issue a ban or another suited punishment based on the situation.<br>
                        This includes but is not limited to:
                        <ul>
                            <li>
                                Discriminatory jokes and language, hate speech, etc.
                            </li>
                            <li>
                                Displaying offensive, derogatory, or sexually explicit (<abbr
                                        title="Not Suited For Work">NSFW</abbr>) content.
                            </li>
                            <li>
                                Verbal abuse, insults, or threats towards others.
                            </li>
                        </ul>
                    </li>
                    <li>
                        In case somebody is in danger of suicide or self-harm, report directly to
                        <a href="mailto:reports@discordapp.com" title="Contact Discord" class="external">reports@discordapp.com</a>.
                        Make sure to include any important message, channel and user IDs.
                    </li>
                </ul>
            </section>
        </article>
    </div>

<?php getFooter(
    '<div class="easteregg2">
        You have clicked the «back to top» button <span class="counter">0</span> times!
    </div>
    <canvas id="confetti"></canvas>'
); ?>