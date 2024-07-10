<img src="http://getkirby.com/assets/images/github/plainkit.jpg" width="300">

**Kirby: the CMS that adapts to any project, loved by developers and editors alike.**
The Plainkit is a minimal Kirby setup with the basics you need to start a project from scratch. It is the ideal choice if you are already familiar with Kirby and want to start step-by-step.

You can learn more about Kirby at [getkirby.com](https://getkirby.com).

### Try Kirby for free

You can try Kirby and the Plainkit on your local machine or on a test server as long as you need to make sure it is the right tool for your next project. … and when you’re convinced, [buy your license](https://getkirby.com/buy).

### Get going

Read our guide on [how to get started with Kirby](https://getkirby.com/docs/guide/quickstart).

You can [download the latest version](https://github.com/getkirby/plainkit/archive/main.zip) of the Plainkit.
If you are familiar with Git, you can clone Kirby's Plainkit repository from Github.

    git clone https://github.com/getkirby/plainkit.git

## What's Kirby?

-   **[getkirby.com](https://getkirby.com)** – Get to know the CMS.
-   **[Try it](https://getkirby.com/try)** – Take a test ride with our online demo. Or download one of our kits to get started.
-   **[Documentation](https://getkirby.com/docs/guide)** – Read the official guide, reference and cookbook recipes.
-   **[Issues](https://github.com/getkirby/kirby/issues)** – Report bugs and other problems.
-   **[Feedback](https://feedback.getkirby.com)** – You have an idea for Kirby? Share it.
-   **[Forum](https://forum.getkirby.com)** – Whenever you get stuck, don't hesitate to reach out for questions and support.
-   **[Discord](https://chat.getkirby.com)** – Hang out and meet the community.
-   **[Mastodon](https://mastodon.social/@getkirby)** – Spread the word.
-   **[Instagram](https://www.instagram.com/getkirby/)** – Share your creations: #madewithkirby.

---

© 2009 Bastian Allgeier
[getkirby.com](https://getkirby.com) · [License agreement](https://getkirby.com/license)


# `$kirby->router()->call($routePath, 'GET')` gibt den Inhalt in der falschen Sprache zurück

Ich habe eine mehrsprachige Webseite mit der folgenden Struktur:

```
/
    en/
        test/
    es/
        test/
```

Both test sites routes are Virtual Pages create in a plugin.

I use the static site generator plugin to generate the site.

When I run the generate.php it creates the site in the correct language, but when I try to generate the site in the other language, it returns the content of the first language.

So i tried dumpling the content in the generate plugin where it gets it from kirby:

```php
protected function _getRouteContent(string $routePath)
	{
		var_dump($routePath);
		if (!$routePath) {
			return null;
		}

		$routeResult = kirby()
			->router()
			->call($routePath, 'GET');

		var_dump($routeResult);

		if ($routeResult instanceof Page) {
			return $routeResult;
		}

		if ($routeResult instanceof \Kirby\Http\Response) {
			$routeResult = $routeResult->body();
		}

		return is_string($routeResult) ? $routeResult : null;
	}
```

it returns the right paths but not the correct content for the paths.

I also tried to dump the content of the ```$content = $page->content($currentLanguage); ```and it returns the correct data for the language.
If i use ```$content = $page->content();``` it returns the wrong content but only in the generated pages if is start the kirby router myself and test it in the Browser everything works.

So I read some more on the router stuff and found the LanguageRouter and tried to use it in the generate plugin:
 but the routes are empty:

```protected function _getRouteContent(string $routePath, string $languageCode = null)
	{
		var_dump($routePath);
		if (!$routePath) {
			return null;
		}
		var_dump($languageCode);

		$routeResult = kirby()
			->router()
			->call($routePath, 'GET');
		
		var_dump(kirby()
			->language($languageCode)
			->router()->routes());
		var_dump(kirby()
			->language($languageCode)
			->router()->call($routePath, 'GET'));
		var_dump(kirby()->router()->call($routePath, 'GET'));


		if ($routeResult instanceof Page) {
			return $routeResult;
		}

		if ($routeResult instanceof \Kirby\Http\Response) {
			$routeResult = $routeResult->body();
		}

		return is_string($routeResult) ? $routeResult : null;
	}
```

I have also created a demo repo for you to check it out:
https://github.com/dustsucker/SSG-Translation

it uses git submodules so you have to initialize them first:

```bash
git submodule init
git submodule update
```

then you can run the generate.php and see the output.

In the test-plugin you can see the routes for the pages and the content of the pages.

I hope you can help me with this problem.
