<div className="grid md:grid-cols-2 gap-6 lg:gap-12 items-start max-w-6xl px-4 mx-auto py-6">
      <div className="grid gap-4 md:gap-8">
        <div className="grid gap-4">
          <img
            src="/placeholder.svg"
            alt="Product Image"
            width={800}
            height={600}
            className="aspect-[4/3] object-cover w-full rounded-lg overflow-hidden"
          />
          <div className="flex gap-4 justify-center">
            <button className="border hover:border-primary rounded-lg overflow-hidden transition-colors">
              <img
                src="/placeholder.svg"
                alt="Preview thumbnail"
                width={100}
                height={100}
                className="aspect-square object-cover"
              />
              <span className="sr-only">View Image 1</span>
            </button>
            <button className="border hover:border-primary rounded-lg overflow-hidden transition-colors">
              <img
                src="/placeholder.svg"
                alt="Preview thumbnail"
                width={100}
                height={100}
                className="aspect-square object-cover"
              />
              <span className="sr-only">View Image 2</span>
            </button>
            <button className="border hover:border-primary rounded-lg overflow-hidden transition-colors">
              <img
                src="/placeholder.svg"
                alt="Preview thumbnail"
                width={100}
                height={100}
                className="aspect-square object-cover"
              />
              <span className="sr-only">View Image 3</span>
            </button>
            <button className="border hover:border-primary rounded-lg overflow-hidden transition-colors">
              <img
                src="/placeholder.svg"
                alt="Preview thumbnail"
                width={100}
                height={100}
                className="aspect-square object-cover"
              />
              <span className="sr-only">View Image 4</span>
            </button>
          </div>
        </div>
        <div className="grid gap-4">
          <div className="grid gap-2">
            <h1 className="text-3xl font-bold">2023 Honda Civic EX</h1>
            <div className="flex items-center gap-4">
              <div className="flex items-center gap-0.5">
                <StarIcon className="w-5 h-5 fill-primary" />
                <StarIcon className="w-5 h-5 fill-primary" />
                <StarIcon className="w-5 h-5 fill-primary" />
                <StarIcon className="w-5 h-5 fill-muted stroke-muted-foreground" />
                <StarIcon className="w-5 h-5 fill-muted stroke-muted-foreground" />
              </div>
              <span className="text-muted-foreground">4.3 (123 reviews)</span>
            </div>
          </div>
          <div className="grid gap-2">
            <div className="grid sm:grid-cols-2 gap-4">
              <div className="grid gap-1">
                <span className="text-muted-foreground">Make</span>
                <span className="font-medium">Honda</span>
              </div>
              <div className="grid gap-1">
                <span className="text-muted-foreground">Model</span>
                <span className="font-medium">Civic</span>
              </div>
              <div className="grid gap-1">
                <span className="text-muted-foreground">Year</span>
                <span className="font-medium">2023</span>
              </div>
              <div className="grid gap-1">
                <span className="text-muted-foreground">Mileage</span>
                <span className="font-medium">25,000 mi</span>
              </div>
            </div>
            <div className="grid gap-1">
              <span className="text-muted-foreground">Description</span>
              <p>
                This 2023 Honda Civic EX is in excellent condition with low mileage. It features a sleek exterior
                design, a spacious interior, and a range of advanced safety and technology features. The car has been
                well-maintained and is ready for its next owner.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div className="grid gap-4 md:gap-8">
        <Card>
          <CardHeader>
            <CardTitle>Contact Seller</CardTitle>
          </CardHeader>
          <CardContent>
            <div className="grid gap-4">
              <div className="grid gap-2">
                <div className="flex items-center gap-4">
                  <Avatar className="w-12 h-12 border">
                    <AvatarImage src="/placeholder-user.jpg" alt="Seller Avatar" />
                    <AvatarFallback>JS</AvatarFallback>
                  </Avatar>
                  <div className="grid gap-1">
                    <h3 className="font-medium">John Smith</h3>
                    <div className="flex items-center gap-2 text-muted-foreground">
                      <LocateIcon className="w-4 h-4" />
                      <span>Los Angeles, CA</span>
                    </div>
                  </div>
                </div>
                <div className="flex items-center gap-2 text-muted-foreground">
                  <StarIcon className="w-4 h-4 fill-primary" />
                  <span>4.8 (125 reviews)</span>
                </div>
              </div>
              <form className="grid gap-4">
                <div className="grid gap-2">
                  <Label htmlFor="name" className="text-base">
                    Your Name
                  </Label>
                  <Input id="name" type="text" placeholder="Enter your name" />
                </div>
                <div className="grid gap-2">
                  <Label htmlFor="email" className="text-base">
                    Your Email
                  </Label>
                  <Input id="email" type="email" placeholder="Enter your email" />
                </div>
                <div className="grid gap-2">
                  <Label htmlFor="message" className="text-base">
                    Your Message
                  </Label>
                  <Textarea id="message" placeholder="Enter your message" className="min-h-[120px]" />
                </div>
                <Button size="lg">Send Message</Button>
              </form>
            </div>
          </CardContent>
        </Card>
        <Card>
          <CardHeader>
            <CardTitle>More from this Seller</CardTitle>
          </CardHeader>
          <CardContent>
            <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
              <Link href="#" className="group relative overflow-hidden rounded-lg shadow-lg" prefetch={false}>
                <img
                  src="/placeholder.svg"
                  alt="Product Image"
                  width={300}
                  height={200}
                  className="aspect-[3/2] object-cover w-full group-hover:opacity-50 transition-opacity"
                />
                <div className="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/80 to-transparent p-4 text-white">
                  <h3 className="text-lg font-medium">{`2022 Toyota Camry LE`}</h3>
                  <p className="text-sm text-muted-foreground">$22,500</p>
                </div>
              </Link>
              <Link href="#" className="group relative overflow-hidden rounded-lg shadow-lg" prefetch={false}>
                <img
                  src="/placeholder.svg"
                  alt="Product Image"
                  width={300}
                  height={200}
                  className="aspect-[3/2] object-cover w-full group-hover:opacity-50 transition-opacity"
                />
                <div className="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/80 to-transparent p-4 text-white">
                  <h3 className="text-lg font-medium">{`2021 Honda Accord Sport`}</h3>
                  <p className="text-sm text-muted-foreground">$25,000</p>
                </div>
              </Link>
              <Link href="#" className="group relative overflow-hidden rounded-lg shadow-lg" prefetch={false}>
                <img
                  src="/placeholder.svg"
                  alt="Product Image"
                  width={300}
                  height={200}
                  className="aspect-[3/2] object-cover w-full group-hover:opacity-50 transition-opacity"
                />
                <div className="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/80 to-transparent p-4 text-white">
                  <h3 className="text-lg font-medium">{`2020 Nissan Altima SV`}</h3>
                  <p className="text-sm text-muted-foreground">$18,000</p>
                </div>
              </Link>
            </div>
          </CardContent>
        </Card>
        <Card>
          <CardHeader>
            <CardTitle>Similar Listings</CardTitle>
          </CardHeader>
          <CardContent>
            <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
              <Link href="#" className="group relative overflow-hidden rounded-lg shadow-lg" prefetch={false}>
                <img
                  src="/placeholder.svg"
                  alt="Product Image"
                  width={300}
                  height={200}
                  className="aspect-[3/2] object-cover w-full group-hover:opacity-50 transition-opacity"
                />
                <div className="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/80 to-transparent p-4 text-white">
                  <h3 className="text-lg font-medium">{`2022 Toyota Corolla LE`}</h3>
                  <p className="text-sm text-muted-foreground">$20,000</p>
                </div>
              </Link>
              <Link href="#" className="group relative overflow-hidden rounded-lg shadow-lg" prefetch={false}>
                <img
                  src="/placeholder.svg"
                  alt="Product Image"
                  width={300}
                  height={200}
                  className="aspect-[3/2] object-cover w-full group-hover:opacity-50 transition-opacity"
                />
                <div className="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/80 to-transparent p-4 text-white">
                  <h3 className="text-lg font-medium">{`2021 Honda Civic LX`}</h3>
                  <p className="text-sm text-muted-foreground">$23,000</p>
                </div>
              </Link>
              <Link href="#" className="group relative overflow-hidden rounded-lg shadow-lg" prefetch={false}>
                <img
                  src="/placeholder.svg"
                  alt="Product Image"
                  width={300}
                  height={200}
                  className="aspect-[3/2] object-cover w-full group-hover:opacity-50 transition-opacity"
                />
                <div className="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/80 to-transparent p-4 text-white">
                  <h3 className="text-lg font-medium">{`2023 Nissan Sentra SV`}</h3>
                  <p className="text-sm text-muted-foreground">$19,500</p>
                </div>
              </Link>
            </div>
          </CardContent>
        </Card>
      </div>
    </div>