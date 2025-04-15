# CyberDefenders----Grab-The-Phisher
CyberDefenders — Grab the Phisher LAB Walkthrough

INTRO

Cybersecurity professionals constantly face the challenge of identifying and mitigating phishing attacks that grow increasingly sophisticated. The CyberDefenders "GrabThePhisher" challenge represents an excellent opportunity to hone these skills by providing a realistic scenario to analyze a phishing campaign. This article presents a comprehensive analysis of the challenge, exploring the techniques employed by attackers, drawing key conclusions, and offering practical protection strategies.

SCENARIO:

A decentralized finance (DeFi) platform recently reported multiple user complaints about unauthorized fund withdrawals. A forensic review uncovered a phishing site impersonating the legitimate PancakeSwap exchange, luring victims into entering their wallet seed phrases. The phishing kit was hosted on a compromised server and exfiltrated credentials via a Telegram bot.

Your task is to conduct threat intelligence analysis on the phishing infrastructure, identify indicators of compromise (IoCs), and track the attacker’s online presence, including aliases and Telegram identifiers, to understand their tactics, techniques, and procedures (TTPs).

Link to the challenge: https://cyberdefenders.org/blueteam-ctf-challenges/grabthephisher/

TOOLS USED:
- COMMAND LINE INTERFACE
- VIRTUAL MACHINE (in the specific VMWARE with Kali Linux)
- GOOGLE SEARCH (or any search engine of choice)

WALKTROUGH:

Q1) Which wallet is used for asking the seed phrase?

After unzipping the file, we have a folder named pankewk. Inside the folder Pankewk, we can see a folder named metamask folder.
By doing a cross-research on the Internet we can identify some names of the most-used digital wallets, 

![q01](https://github.com/user-attachments/assets/23b5a565-4c19-4f5e-bd20-28a9db317003)

and the name Metamask strikes out attention, as it is also the name found inside our downloaded folder.

![q002](https://github.com/user-attachments/assets/c8a754f0-8405-419c-aa06-d7e54366826a)


Q2) What is the file name that has the code for the phishing kit?

In phishing campaigns, attackers often create and deploy phishing kits containing files and scripts designed to mimic legitimate websites or services. In our case we notice the file named *metamask.php*: file name is significant because.php files are frequently used for server-side scripting, and in our particular instance, *metamask.php* **handles the essential functionality of the phishing operation**. 


Q3) In which language was the kit written?
Pretty self-explanatory  and the answer is PHP - as indicated int he script we have just analyzed.

PHP or short for "Hypertext Preprocessor," is a widely used open-source scripting language primarily used for web development and is embedded into HTML to create dynamic web pages and is executed on the server side, allowing it to handle tasks such as processing form inputs, managing sessions, and interacting with databases. Being highly compatible and easy to implement with many of the web servers is a favorite choice for many phishing attacks, and particularly convenient when we are dealing with a web application such our digital wallet - Metamask - as the attacker can exfiltrate data and send it to controlled endpoints, like Telegram bots and log collectors.

Q4) What service does the kit use to retrieve the victim's machine information?
By analyzing the header part of the .php file we can find the script has functionality to interact with the Sypex Geo API, a popular tool designed to retrieve geolocation details based on a user’s IP address.

![q4](https://github.com/user-attachments/assets/eb9451f6-d055-4c3a-84de-c324450e13ee)


Q5) How many seed phrases were already collected?
Let's further analyze the folder to see that exfiltrated data are recorded into a log.txt located in the log folder.
Accessing the content of the log.txt file we will see a list of words.

![q5](https://github.com/user-attachments/assets/32e4ffe3-cc82-4dc7-b6aa-2abbaac0e3d7)


These words in the blockchain context are related to the seed phrase / recovery phrase / mnemonic phrase - the same terminology to describe a sequence of words that acts as a master key to a cryptocurrency wallet: transactions are signed and confirmed thanks to this key, making it extremely valuable to attackers!
Since keys can be of wither 12 or 24 words values, by counting the words located in the folder, we can identify 3 seed phrases that have been already collected by the attacker.

Q6)  Write down the seed phrase of the most recent phishing incident?
The most recent seed phrase seems to be:
father also recycle embody balance concert mechanic believe owner pair muffin hockey

![q5](https://github.com/user-attachments/assets/aa2af688-1aa0-40f9-930d-2cd13b81c81f)

Q7) Which medium had been used for credential dumping?
Analyzing the script Metamak.php we can see that data are exfiltrated to the instant messaging platform Telegram leveraging a Telegram bot, a common technique used by phishing attackers.

![q7](https://github.com/user-attachments/assets/481741cc-e18e-4a77-9a2f-dab0aaf9014e)

Q8) What is the token for the channel?
Located in the same section of the script, is: 5457463144:AAG8t4k7e2ew3tTi0IBShcWbSia0Irvxm10.

![q9](https://github.com/user-attachments/assets/5eaa26f8-4ee6-4cb0-8470-125fadbaeacd)

Q9) What is the chat ID of the phisher's channel?
Also found in the phishing script: 5442785564.

![q9](https://github.com/user-attachments/assets/690921ee-0e0d-4dd7-9322-6d13ef35ecfb)

Q10) What are the allies of the phish kit developer?
By keeping analyzing the script, we get the following answer: j1j1b1s@m3r0

![q10](https://github.com/user-attachments/assets/e84d6e3d-c47f-488e-a6ba-c322d2f512e6)

Q11) What is the full name of the Phish Actor?
To answer these questions, we need to re-analyze the sendTel function. Once this is done, we can notice that the function provides us with all the information we need to access the phisher communication channel.

With the information provided we can simulate a GET request on the server to try to obtain the information needed, by accessing the URL“https://api.telegram.org/bot5457463144:AAG8t4k7e2ew3tTi0IBShcWbSia0Irvxm10/getChat?chat_id=5442785564" - using the provided token and chat ID, we receive a specific result from the Telegram Bot API. 

![q11](https://github.com/user-attachments/assets/3239dd7e-4726-4e43-ba70-fd6875cf8cf0)

The phisher full name is Marcus Aurelius.

Q12) What is the username of the Phish Actor?
Following up Q11, we see that the phisher name is "pumpkinboii"

![q11](https://github.com/user-attachments/assets/4c0959ad-58cf-419c-8eea-bc42cdef48d9)


CONCLUSIONS

The CyberDefenders GrabThePhisher challenge offers valuable insights into modern phishing techniques and essential defensive strategies. For security professionals, the ability to thoroughly analyze phishing infrastructure, understand attacker methodologies, and implement effective countermeasures remains a critical skill set.
As phishing techniques continue to evolve, organizations must maintain vigilance through a combination of technological defenses, user education, and rapid response capabilities. By understanding how these attacks work at a fundamental level, as demonstrated in the challenge, security teams can better protect their organizations against this persistent threat.
The challenge ultimately reminds us that phishing defense requires constant adaptation. Yesterday's security measures may not address tomorrow's phishing techniques, making continuous learning and improvement essential components of any cybersecurity strategy.

I want to thank the team of CyberDefenders.org and the challenge creators for a concise, yet insightful Lab as the practical application of concepts made this far more valuable than theoretical learning alone. I appreciate the time and effort put into creating such a valuable resource for the cybersecurity community. Thank you for contributing to my growth as a blue team analyst!

I hope you found this walkthrough insightful as well! If you found this content helpful, please consider giving it a clap! Your feedback is invaluable and motivates me to continue supporting your journey in the cybersecurity community. Remember, LET'S ALL BE MORE SECURE TOGETHER! For more insights and updates on cybersecurity analysis, follow me on Substack! [https://substack.com/@atlasprotect?r=1f5xo4&utm_campaign=profile&utm_medium=profile-page]


